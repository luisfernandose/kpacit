<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Accounting;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentChannel;
use App\Models\ReserveMeeting;
use App\Models\Sale;
use App\Models\TicketUser;
use App\Models\Webinar;
use App\PaymentChannels\ChannelManager;
use App\Services\AlegraService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function paymentRequest(Request $request)
    {
        $this->validate($request, [
            'gateway' => 'required'
        ]);

        $user = auth()->user();
        $gateway = $request->input('gateway');
        $orderId = $request->input('order_id');

        $order = Order::where('id', $orderId)
            ->where('user_id', $user->id)
            ->first();

        if ($order->type === Order::$meeting) {
            $orderItem = OrderItem::where('order_id', $order->id)->first();
            $reserveMeeting = ReserveMeeting::where('id', $orderItem->reserve_meeting_id)->first();
            $reserveMeeting->update(['locked_at' => time()]);
        }

        if ($gateway === 'credit') {

            if ($user->getAccountingCharge() < $order->amount) {
                $order->update(['status' => Order::$fail]);

                $data = [
                    'pageTitle' => trans('public.cart_page_title'),
                    'order' => $order,
                ];

                return view('web.default.cart.status_pay', $data);
            }

            $order->update([
                'payment_method' => Order::$credit
            ]);

            $this->setPaymentAccounting($order, 'credit');

            $order->update([
                'status' => Order::$paid
            ]);

            $data = [
                'pageTitle' => trans('public.cart_page_title'),
                'order' => $order,
            ];

            return view('web.default.cart.status_pay', $data);
        }

        $paymentChannel = PaymentChannel::where('id', $gateway)
            ->where('status', 'active')
            ->first();

        if (!$paymentChannel) {
            $toastData = [
                'title' => trans('cart.fail_purchase'),
                'msg' => trans('public.channel_payment_disabled'),
                'status' => 'error'
            ];
            return redirect('cart')->with(['toast' => $toastData]);
        }

        $order->payment_method = Order::$paymentChannel;
        $order->save();

        try {
            $channelManager = ChannelManager::makeChannel($paymentChannel);
            $redirect_url = $channelManager->paymentRequest($order);

            if (in_array($paymentChannel->class_name, ['Paytm', 'Payu', 'Zarinpal', 'Stripe', 'Paysera', 'MercadoPago', 'Cashu', 'Iyzipay'])) {
                return $redirect_url;
            }

            return Redirect::away($redirect_url);

        } catch (\Exception $exception) {
            $toastData = [
                'title' => trans('cart.fail_purchase'),
                'msg' => trans('cart.gateway_error'),
                'status' => 'error'
            ];
            return redirect('cart')->with(['toast' => $toastData]);
        }
    }

    public function paymentVerify(Request $request, $gateway)
    {
        $paymentChannel = PaymentChannel::where('class_name', $gateway)
            ->where('status', 'active')
            ->first();

        try {
            $channelManager = ChannelManager::makeChannel($paymentChannel);
            $order = $channelManager->verify($request);

            if (!empty($order)) {
                $orderItem = OrderItem::where('order_id', $order->id)->get();

                $reserveMeeting = null;

                foreach ($orderItem as $item) {

                    if ($item && $item->reserve_meeting_id && !$reserveMeeting) {

                        $reserveMeeting = ReserveMeeting::where('id', $item->reserve_meeting_id)->first();

                    }

                }

                if ($order->status == Order::$paying) {

                    $this->setPaymentAccounting($order);

                    $order->update(['status' => Order::$paid]);

                    // Generación de la factura en el ERP
                    $alegraService = new AlegraService();

                    $anotation = 'Kpacit order ' . $order->id;

                    $items = [];

                    foreach ($orderItem as $item) {

                        $webinar = Webinar::select('id', 'external_id', 'title')
                            ->find($item->webinar_id);

                        $items[] = (Object)[
                            'id' => $webinar->external_id,
                            'price' => $item->amount,
                            'description' => $webinar->title,
                            'quantity' => 1,
                            'tax' => [
                                (Object)[
                                    'id' => config('alegra.tax_id'),
                                ],
                            ],
                        ];

                    }

                    $alegraUser = User::select('id', 'external_id')
                        ->find($order->user_id);

                    $serviceResult = $alegraService->createInvoice($alegraUser->external_id, $items, $anotation, $order->total_amount);

                    if (!$serviceResult->success || empty($serviceResult->data->id)) {

                        $toastData = [
                            'title' => trans('public.request_failed'),
                            'msg' => 'No se pudo crear la factura en el ERP',
                            'status' => 'error'
                        ];

                        return back()->with(['toast' => $toastData]);

                    }

                    $order->update([
                        'external_invoice_id' => $serviceResult->data->id
                    ]);

                } else {
                    if ($order->type === Order::$meeting) {
                        $reserveMeeting->update(['locked_at' => null]);
                    }
                }

                return redirect('/payments/status?order_id=' . $order->id);
            }

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            $toastData = [
                'title' => trans('cart.fail_purchase'),
                'msg' => trans('cart.gateway_error'),
                'status' => 'error'
            ];
            return redirect('cart')->with(['toast' => $toastData]);
        }
    }

    public function setPaymentAccounting($order, $type = null)
    {
        if ($order->is_charge_account) {
            Accounting::charge($order);
        } else {
            foreach ($order->orderItems as $orderItem) {
                $sale = Sale::createSales($orderItem, $order->payment_method);

                if (!empty($orderItem->reserve_meeting_id)) {
                    $reserveMeeting = ReserveMeeting::where('id', $orderItem->reserve_meeting_id)->first();
                    $reserveMeeting->update([
                        'sale_id' => $sale->id,
                        'reserved_at' => time()
                    ]);
                }

                if (!empty($orderItem->subscribe_id)) {
                    Accounting::createAccountingForSubscribe($orderItem, $type);
                } elseif (!empty($orderItem->promotion_id)) {
                    Accounting::createAccountingForPromotion($orderItem, $type);
                } else {
                    // webinar and meeting

                    Accounting::createAccounting($orderItem, $type);
                    TicketUser::useTicket($orderItem);
                }
            }
        }

        Cart::emptyCart($order->user_id);
    }

    public function payStatus(Request $request)
    {
        $orderId = $request->get('order_id');

        $order = Order::where('id', $orderId)
            ->where('user_id', auth()->id())
            ->first();

        if (!empty($order)) {
            $data = [
                'pageTitle' => trans('public.cart_page_title'),
                'order' => $order,
            ];

            return view('web.default.cart.status_pay', $data);
        }

        abort(404);
    }
}
