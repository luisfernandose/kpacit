<?php

namespace App\PaymentChannels\Drivers\Payu;

use App\Models\Order;
use App\Models\PaymentChannel;
use App\PaymentChannels\IChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Channel implements IChannel
{
    /**
     * Channel constructor.
     * @param PaymentChannel $paymentChannel
     */
    public function __construct(PaymentChannel $paymentChannel)
    {
    }

    public function paymentRequest(Order $order)
    {
        $reference = 'K' . $order->id . '_k' . $order->user->id;

        $merchantId = config('services.payu.merchant_id');
        $accountId = config('services.payu.account_id');
        $apiKey = config('services.payu.api_key');
        $currency = config('services.payu.currency');

        $data = (Object)[
            'merchantId' => $merchantId,
            'accountId' => $accountId,
            'description' => 'Pago Kpacit',
            'referenceCode' => $reference,
            'amount' => round($order->total_amount, 2),
            'tax' => round($order->tax, 2),
            'taxReturnBase' => round($order->amount, 2),
            'currency' => $currency,
            'signature' => md5($apiKey . '~' . $merchantId . '~' . $reference . '~' . round($order->total_amount, 2) . '~' . $currency),
            'test' => config('services.payu.test_mode'),
            'buyerFullName' => $order->user->full_name ?? '',
            'buyerEmail' => $order->user->email ?? 'payment@kpacit.com',
            'responseUrl' => route('payment_verify', ['gateway' => 'Payu']),
            'confirmationUrl' => route('payment_verify_post', ['gateway' => 'Payu']),
            'extra1' => $order->id,
            'extra2' => $order->user->id,
            'endPoint' => config('services.payu.end_point'),
        ];

        return view('web.default.cart.payu_payment', [
            'data' => $data,
        ]);

    }

    public function verify(Request $request)
    {
        Log::info(json_encode($request->all()));

        $order_id = $request->extra1 ?? 0;
        $user_id = $request->extra2 ?? 0;

        if ($order_id && $user_id) {

            $apiKey = config('services.payu.api_key');

            $signature = '1';
            $localSignature = '0';

            if ($request->isMethod('get')) {

                $merchantId = $request->merchantId;
                $reference = $request->referenceCode;
                $value = $request->TX_VALUE;
                $currency = $request->currency;
                $transactionState = $request->transactionState;
                $signature = $request->signature;

                $value = number_format($value, 1, '.', '');

                $localSignature = md5("$apiKey~$merchantId~$reference~$value~$currency~$transactionState");

            } else if ($request->isMethod('post')) {

                $merchantId = $request->merchant_id;
                $reference = $request->reference_sale;
                $value = $request->value;
                $currency = $request->currency;
                $transactionState = $request->state_pol;
                $signature = $request->sign;

                $value = number_format($value, 2, '.', '');

                $lastDigit = substr($value, -1);

                // Si el último dígito es 0 se toma un solo decimal
                if ($lastDigit == 0) {

                    $value = number_format($value, 1, '.', '');

                }

                $localSignature = md5("$apiKey~$merchantId~$reference~$value~$currency~$transactionState");

            }

            if (strtoupper($signature) == strtoupper($localSignature)) {

                $order = Order::where('id', $order_id)
                    ->where('user_id', $user_id)
                    ->first();

                if (!empty($order) && $order->status != Order::$paying && $order->status != Order::$paid) {

                    if ($transactionState == 4) {

                        $order->update(['status' => Order::$paying]);

                    } elseif ($transactionState == 6 || $transactionState == 104) {

                        $order->update(['status' => Order::$fail]);

                        $toastData = [
                            'title' => trans('cart.fail_purchase'),
                            'msg' => trans('cart.gateway_error'),
                            'status' => 'error'
                        ];

                        return back()->with(['toast' => $toastData])->withInput();

                    } elseif ($transactionState == 7 || $transactionState == 14 || $transactionState == 10 || $transactionState == 15
                        || $transactionState == 12 || $transactionState == 18) {

                        $order->update(['status' => Order::$pending]);

                    } else {

                        $toastData = [
                            'title' => trans('cart.fail_purchase'),
                            'msg' => trans('cart.gateway_error'),
                            'status' => 'error'
                        ];

                        return back()->with(['toast' => $toastData])->withInput();

                    }

                    return $order;

                }

                return back();

            } else {

                $toastData = [
                    'title' => trans('cart.fail_purchase'),
                    'msg' => trans('cart.gateway_error'),
                    'status' => 'error'
                ];

                return back()->with(['toast' => $toastData])->withInput();

            }

        }

    }
}
