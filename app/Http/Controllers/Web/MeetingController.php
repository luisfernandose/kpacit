<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Meeting;
use App\Models\MeetingTime;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentChannel;
use App\Models\ReserveMeeting;
use App\Models\Sale;
use App\Models\Setting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function reserve(Request $request)
    {
        $user = auth()->user();
        $timeIds = $request->input('time');
        $day = $request->input('day');
        $day = dateTimeFormat($day, 'Y-m-d');

        if (!empty($timeIds)) {
            $meetingTimes = MeetingTime::whereIn('id', $timeIds)
                ->with('meeting')
                ->get();

            if ($meetingTimes->isNotEmpty()) {
                $meetingId = $meetingTimes->first()->meeting_id;
                $meeting = Meeting::find($meetingId);

                if (!empty($meeting) and !$meeting->disabled) {
                    if (!empty($meeting->amount) and $meeting->amount > 0) {
                        foreach ($meetingTimes as $meetingTime) {
                            $reserveMeeting = ReserveMeeting::where('meeting_time_id', $meetingTime->id)
                                ->where('day', $day)
                                ->first();

                            if (!empty($reserveMeeting) and $reserveMeeting->locked_at) {
                                $toastData = [
                                    'title' => trans('public.request_failed'),
                                    'msg' => trans('meeting.locked_time'),
                                    'status' => 'error'
                                ];
                                return back()->with(['toast' => $toastData]);
                            }

                            if (!empty($reserveMeeting) and $reserveMeeting->reserved_at) {
                                $toastData = [
                                    'title' => trans('public.request_failed'),
                                    'msg' => trans('meeting.reserved_time'),
                                    'status' => 'error'
                                ];
                                return back()->with(['toast' => $toastData]);
                            }

                            $hourlyAmount = $meetingTime->meeting->amount;
                            $explodetime = explode('-', $meetingTime->time);
                            $hours = (strtotime($explodetime[1]) - strtotime($explodetime[0])) / 3600;

                            $reserveMeeting = ReserveMeeting::updateOrCreate([
                                'user_id' => $user->id,
                                'meeting_time_id' => $meetingTime->id,
                                'meeting_id' => $meetingTime->meeting_id,
                                'status' => ReserveMeeting::$pending,
                                'day' => $day,
                                'date' => strtotime($day),
                            ], [
                                'paid_amount' => (!empty($hourlyAmount) and $hourlyAmount > 0) ? $hourlyAmount * $hours : 0,
                                'discount' => $meetingTime->meeting->discount,
                                'created_at' => time(),
                            ]);

                            $cart = Cart::where('creator_id', $user->id)
                                ->where('reserve_meeting_id', $reserveMeeting->id)
                                ->first();

                            if (empty($cart)) {
                                Cart::create([
                                    'creator_id' => $user->id,
                                    'reserve_meeting_id' => $reserveMeeting->id,
                                    'created_at' => time()
                                ]);
                            }
                        }

                        return redirect('/cart');
                    } else {
                        return $this->handleFreeMeetingReservation($user, $meeting, $meetingTimes, $day);
                    }
                } else {
                    $toastData = [
                        'title' => trans('public.request_failed'),
                        'msg' => trans('meeting.meeting_disabled'),
                        'status' => 'error'
                    ];
                    return back()->with(['toast' => $toastData]);
                }
            }
        }

        $toastData = [
            'title' => trans('public.request_failed'),
            'msg' => trans('meeting.select_time_to_reserve'),
            'status' => 'error'
        ];
        return back()->with(['toast' => $toastData]);
    }

    private function handleFreeMeetingReservation($user, $meeting, $meetingTimes, $day)
    {
        foreach ($meetingTimes as $meetingTime) {
            $hourlyAmount = $meetingTime->meeting->amount;
            $explodetime = explode('-', $meetingTime->time);
            $hours = (strtotime($explodetime[1]) - strtotime($explodetime[0])) / 3600;

            $reserve = ReserveMeeting::updateOrCreate([
                'user_id' => $user->id,
                'meeting_time_id' => $meetingTime->id,
                'meeting_id' => $meetingTime->meeting_id,
                'status' => ReserveMeeting::$pending,
                'day' => $day,
                'date' => strtotime($day),
            ], [
                'paid_amount' => (!empty($hourlyAmount) and $hourlyAmount > 0) ? $hourlyAmount * $hours : 0,
                'discount' => $meetingTime->meeting->discount,
                'created_at' => time(),
            ]);

            if (!empty($reserve)) {
                $sale = Sale::create([
                    'buyer_id' => $user->id,
                    'seller_id' => $meeting->creator_id,
                    'meeting_id' => $meeting->id,
                    'type' => Sale::$meeting,
                    'payment_method' => Sale::$credit,
                    'amount' => 0,
                    'total_amount' => 0,
                    'created_at' => time(),
                ]);

                if (!empty($sale)) {
                    $reserve->update([
                        'sale_id' => $sale->id,
                        'reserved_at' => time()
                    ]);
                }
            }
        }

        $toastData = [
            'title' => '',
            'msg' => trans('cart.success_pay_msg_for_free_meeting'),
            'status' => 'success'
        ];
        return back()->with(['toast' => $toastData]);
    }
}
