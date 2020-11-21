<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Crypt;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\Cart;
use App\Wishlist;
use App\Order;
use App\Currency;
use Mail;
use App\Mail\SendOrderMail;
use App\Notifications\UserEnroll;
use App\Course;
use App\User;
use Notification;

class TestController extends Controller
{
    
    public function __construct()
    {
		/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function payWithpaypal(Request $request)
    {
    return $request;	
    	$pay = Crypt::decrypt($request->amount);
    	Session::put('payment',$pay);
		$payer = new Payer();
		        $payer->setPaymentMethod('paypal');
		$item_1 = new Item();
		$item_1->setName('Item 1') /** item name **/
		            ->setCurrency('USD')
		            ->setQuantity(1)
		            ->setPrice($pay); /** unit price **/
		$item_list = new ItemList();
		        $item_list->setItems(array($item_1));
		$amount = new Amount();
		        $amount->setCurrency('USD')
		            ->setTotal($pay);
		$transaction = new Transaction();
		        $transaction->setAmount($amount)
		            ->setItemList($item_list)
		            ->setDescription('Your transaction description');
		$redirect_urls = new RedirectUrls();
		        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
		            ->setCancelUrl(URL::route('status'));
		$payment = new Payment();
		        $payment->setIntent('Sale')
		            ->setPayer($payer)
		            ->setRedirectUrls($redirect_urls)
		            ->setTransactions(array($transaction));
		        
		        try {
		$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
		if (\Config::get('app.debug')) {
		\Session::put('error', 'Connection timeout');
		                return Redirect::route('paywithpaypal');
		} else {
		\Session::put('error', 'Some error occur, sorry for inconvenient');
		                return Redirect::route('paywithpaypal');
		}
		}
		foreach ($payment->getLinks() as $link) {
		if ($link->getRel() == 'approval_url') {
		$redirect_url = $link->getHref();
		                break;
		}
		}
		/** add payment ID to session **/
		        Session::put('paypal_payment_id', $payment->getId());
		if (isset($redirect_url)) {
		/** redirect to paypal **/
		            return Redirect::away($redirect_url);
		}
		\Session::put('error', 'Unknown error occurred');
		        return Redirect::route('paywithpaypal');
	}

	public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $amount = Session::get('payment');
		/** clear the session payment ID **/
		        Session::forget('paypal_payment_id');
		        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
		\Session::put('error', 'Payment failed');
		            return Redirect::route('/');
		}
		 $payment = Payment::get($payment_id, $this->_api_context);
		    	$execution = new PaymentExecution();
		        $execution->setPayerId(Input::get('PayerID'));
		/**Execute the payment **/
		    $result = $payment->execute($execution, $this->_api_context);



		if ($result->getState() == 'approved') {
					

			$currency = Currency::first();
			
			$carts = Cart::where('user_id',Auth::User()->id)->get();
		   
		   	foreach($carts as $cart)
		   	{ 
		   		if ($cart->offer_price != 0)
	            {
	                $pay_amount =  $cart->offer_price;
	            }
	            else
	            {
	                $pay_amount =  $cart->price;
	            }

	            if ($cart->disamount != 0 || $cart->disamount != NULL)
	            {
	                $cpn_discount =  $cart->disamount;
	            }
	            else
	            {
	                $cpn_discount =  '';
	            }

	            if ($cart->courses->duration != NULL && $cart->courses->duration !='')
                {
                    $days = $cart->courses->duration * 30;
                    $todayDate = date('Y-m-d');
                    $expireDate = date("Y-m-d", strtotime("$todayDate +$days days"));
                }
                else{
                    $todayDate = NULL;
                    $expireDate = NULL;
                }
	                   
		        $created_order = Order::create([
		        	'course_id' => $cart->course_id,
		        	'user_id' => Auth::User()->id,
		        	'instructor_id' => $cart->courses->user_id,
		            'transaction_id' => $payment_id,
		            'payment_method' => 'PayPal',
		            'total_amount' => $pay_amount,
		            'coupon_discount' => $cpn_discount,
		            'currency' => $currency->currency,
		            'currency_icon' => $currency->icon,
		            'duration' => $cart->courses->duration,
		            'enroll_start' => $todayDate,
                    'enroll_expire' => $expireDate,
		            'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
		            ]
		        );
		        
		        Wishlist::where('user_id',Auth::User()->id)->where('course_id', $cart->course_id)->delete();

		        if($created_order){
					try{
						
						/*sending email*/
						$x = 'You are successfully enrolled in a course';
						$order = $created_order;
						Mail::to(Auth::User()->email)->send(new SendOrderMail($x, $order));


					}catch(\Swift_TransportException $e){
						header( "refresh:5;url=./" );
						dd("Payment Successfully ! but Invoice will not sent because admin not updated the mail setting in admin dashboard ! Redirecting you to homepage... !");
					}
				}

				if($created_order){
					// Notification when user enroll
			        $cor = Course::where('id', $cart->course_id)->first();

			        $course = [
			          'title' => $cor->title,
			          'image' => $cor->preview_image,
			        ];

			        $enroll = Order::where('course_id', $cart->course_id)->get();

			        if(!$enroll->isEmpty())
			        {
			            foreach($enroll as $enrol)
			            {
			                $user = User::where('id', $enrol->user_id)->get();
			                Notification::send($user,new UserEnroll($course));
			            }
			        }
				}
		    }
		       
		       
		    Cart::where('user_id',Auth::User()->id)->delete();
        	

        \Session::flash('success', 'Payment success');
		    return Redirect::route('home');
		}
		\Session::flash('delete', 'Payment failed');
		    return Redirect::route('home');
	}
}
