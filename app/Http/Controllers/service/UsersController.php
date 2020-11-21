<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;

use Validator, Input, Redirect;
use Lcobucci\JWT\Parser; 
use App\User;
use App\Tb_Courses;
use App\Instructor;
use App\Course;
use App\Order;
use App\Tb_Purchased_Course;
use App\Announcement;
use App\Allcountry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
// use  Auth;
use App\ReviewRating;
use App\WhatLearn;
use App\Setting;
use App\CourseInclude;
use App\CourseChapter;
use App\CourseClass;
use App\Http\Controllers\service\CourseController as courseCon;

class UsersController extends Controller
{
	protected $jwt;

	public function __construct(JWTAuth $jwt)
	{
		$this->jwt = $jwt;  
	}

	public function getProfileview(Request $request)
	{  
        // $_REQUEST=json_decode($request->getContent(),true);
		$status = 400;
		$rules = array(
			'user_id' =>'required',
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 

			$userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail','country_id','phone_otp')->where('id',$request->user_id)->first();  
			if($userDetail && ($userDetail['role']=='admin' || $userDetail['role']=='user')   ){
				$userDetail['name']=trim($userDetail->fname." ".$userDetail->lname);
				if($userDetail->country_id>0){
					$country=Allcountry::where('id',$userDetail->country_id)->first();
					$userDetail['country_code']="+".$country->phonecode;
				}else{
					$userDetail['country_code']='';
				}
				if($userDetail['user_img']!=''){
					$userDetail['user_img']=URL::to('/')."/images/user_img/".$userDetail['user_img'];
				}
				$response["success"]= true;
				$response["message"]='success';
				$response['user_detail']=$userDetail; 
				$status = 200;
			}else{
				$response["success"]= false;
				$response["message"]='Invalide user';
			}


		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}

	public function postSignin(Request $request)
	{
		$status = 400;
		$rules = array(
			'email'     =>'required',
			'password'  =>'required',
			'role'      =>'required',
		);      
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {


			$userDetails= User::where('role',$request->role)->where('email',$request->email)->first();
			if($userDetails){
				$password_match = Hash::check($request->password, $userDetails->password);
				if ($userDetails && $password_match == 1) {
					$credentials['email'] = $request->email;
					$credentials['password'] = $request->password;
            // $token = \Auth::attempt($credentials);
            // echo '<pre>';print_r($token);exit();
            // $token = auth()->login($userDetails); 
            // $token='ssss';




					try {

						if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
							return response()->json(['user_not_found'], 404);
						}

					} catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

						return response()->json(['token_expired'], 500);

					} catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

						return response()->json(['token_invalid'], 500);

					} catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

						return response()->json(['token_absent' => $e->getMessage()], 500);

					}
					$tokenn=compact('token');
        // return response()->json(compact('token'));
					if($token){

						if($userDetails->active =='0'){
							$response["success"]= false;
							$response["message"]        = "Your Account is not active";

						} else if($userDetails->active=='2'){  
							$response["success"]= false;
							$response["message"]        = "Your Account is BLocked";
						}else if($userDetails->active=='3'){  
							$response["success"]= false;
							$response["message"]        = "Your Account is Deleted";
						} else {

							User::where('email',$request->email)->update(['device'=>$request->device,$request->device=>$request->mobile_token]);

							$userDetail= User::select('id','fname','lname','email','user_img','mobile','detail','country_id')->where('email',$request->email)->first(); 
							if($userDetail->country_id>0){
								$country=Allcountry::where('id',$userDetail->country_id)->first();
								$userDetail['country_code']="+".$country->phonecode;  
							}else{
								$userDetail['country_code']='';
							}             
							$userDetail['name']=trim($userDetail->fname." ".$userDetail->lname);
							$userDetail['user_img']=URL::to('/')."/images/user_img/".$userDetail['user_img'];

							$token = 'Bearer '.$tokenn['token'];
							$response['token'] = $token;
							$response["success"]= true;
							$response["message"]='signin successfully';
							$response['user_detail']=$userDetail;

							$status = 200;
						}
					}else{
						$response["success"]= false;
						$response["message"]    = "Your email,password combination was incorrect";
					}
				}else {
					$response["success"]= false;
					$response["message"]    = "Your email,password combination was incorrect";
				}
			}else{
				$response["success"]= false;
				$response["message"]    = "Your email,password combination was incorrect";
			}




		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postSocialmedia(Request $request)
	{
		$_REQUEST=json_decode($request->getContent(),true);
		$status=400;
		$rules = array(
			'from'          =>'required|in:gmail,facebook,apple',
			'name'          =>'required',           
			'device'        =>'required',           
			'mobile_token'  =>'required',
			// 'mobile' =>'required'
		);  
		if(isset($_REQUEST['from']) && $_REQUEST['from'] == 'gmail'){
			$rules['email'] = 'required';
		}elseif(isset($_REQUEST['from']) && $_REQUEST['from'] == 'facebook'){
			$rules['imageURL'] = 'required';
		}    
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 

			$userData = $_REQUEST; 

			if($userData['from'] == 'gmail'){

				$authCheck = User::where('email',$userData['email'])->where('role','user')->exists();

				if($authCheck == false){

					$userName = explode(' ',$userData['name']); 

					$authen = new User;
					$authen->role                   = 'user';
					$authen->email                  = $userData['email'];
					$authen->mobile                 = isset($userData['mobile']) ? $userData['mobile'] : '';
					$authen->fname                  = isset($userName[0]) ? $userName[0] : '';
					$authen->lname                  = isset($userName[1]) ? $userName[1] : 
					$authen->email_verified_at      = '1';
					$authen->device                 = $userData['device'];
					$authen->{$userData['device']}  = $userData['mobile_token'];

					$authen->save();

					$status=200;
				}else{
					User::where('email',$userData['email'])->update(array($userData['device']=>$userData['mobile_token']));
				}       

				$where = 'email';
				$whereVal = $userData['email'];

			}elseif($userData['from'] == 'facebook'){

				$authCheck = User::where('socialmediaImg',$userData['imageURL'])->where('role','user')->exists();

				if($authCheck == false){
					$userName = explode(' ',$userData['name']);
					$authen = new User;
					$authen->role_id        = 'user';
					$authen->username       = $userData['name'];
					$authen->fname     = isset($userName[0]) ? $userName[0] : '';
					$authen->lname      = isset($userName[1]) ? $userName[1] : '';
					$authen->email          = isset($userData['email']) ? $userData['email'] : '';
					$authen->socialmediaImg = $userData['imageURL'];
					$authen->active         = '1';
					$authen->device         = $userData['device'];
					$authen->{$userData['device']}   = $userData['mobile_token'];

					$authen->save();
					$status=200;
				}else{
					\DB::table('tb_users')->where('socialmediaImg',$userData['imageURL'])->update(array($userData['device']=>$userData['mobile_token']));
				}  
				$where = 'socialmediaImg'; 
				$whereVal = $userData['imageURL'];
			}elseif($userData['from'] == 'apple'){

				$authCheck = User::where('appleid',$userData['appleid'])->where('role','user')->exists();

				if($authCheck == false){

					$userName = explode(' ',$userData['name']);
					$authen = new User;
					$authen->role_id        = 'user';
					$authen->username     = $userData['name'];
					$authen->fname   = isset($userName[0]) ? $userName[0] : '';
					$authen->lname    = isset($userName[1]) ? $userName[1] : '';
					$authen->email      = $userData['email'];
					$authen->socialmediaImg = $userData['imageURL'];
					$authen->active     = '1';
					$authen->device     = $userData['device_id'];
					$authen->appleid    = $userData['appleid'];
					$authen->{$userData['device']} = $userData['mobile_token'];

					$authen->save();  
					$status=200;
				}else{

					$data[$userData['device']]=$userData['mobile_token'];
					if($userData['name']!='name'){
						$userName = explode(' ',$userData['name']); 
						$data['username']= $userData['name'];         
						$data['fname']   = isset($userName[0]) ? $userName[0] : '';
						$data['lname']    = isset($userName[1]) ? $userName[1] : '';
					}
					if($userData['email']!='name@gmail.com' || $userData['email']!='email@gmail.com' || $userData['email']!='private@gmail.com'){
						$data['email']      = $userData['email'];
					}
					\DB::table('tb_users')->where('appleid',$userData['appleid'])->update($data);
				}   

				$where = 'appleid';
				$whereVal = $userData['appleid'];
			}





			$userDetails= User::where('role','user')->where($where,$whereVal)->first();

			if ($userDetails) {
				if($userDetails->country_id>0){
					$country=Allcountry::where('id',$userDetails->country_id)->first();
					$userDetails['country_code']="+".$country->phonecode;
				}else{
					$userDetails['country_code']='';
				}
				$userDetails['name']=trim($userDetails->fname." ".$userDetails->lname);
				$userDetails['user_img']=($userDetails['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetails['user_img'] : \URL::to('/images/default/user.jpg');
				if($userDetails->active =='0'){
					$response["success"]= false;
					$response["message"]        = "Your Account is not active";

				} else if($userDetails->active=='2'){  
					$response["success"]= false;
					$response["message"]        = "Your Account is BLocked";
				}else if($userDetails->active=='3'){  
					$response["success"]= false;
					$response["message"]        = "Your Account is Deleted";
				} else {

					$response["success"]= true;
					$response["message"]='signin successfully';
					$response['user_detail']=$userDetails;
					$status=200;
				}
			}else {
				$response["success"]= false;
				$response["message"]    = "Invalide user";
			}

		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postSigninmobile(Request $request)
	{
		$_REQUEST=json_decode($request->getContent(),true);
		$status=400;
		$rules = array(
			'mobile'            =>'required',
			'password'          =>'required',
			'role'              =>'required',           
			'device'            =>'required',           
			'mobile_token'      =>'required',
			'country_id'		=>'required'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 

			$userDetails= User::select('status','password')->where('role',$_REQUEST['role'])->where('country_id',$_REQUEST['country_id'])->where('mobile',$_REQUEST['mobile'])->first();
			if($userDetails){
				$password_match = Hash::check($_REQUEST['password'], $userDetails->password);
				if ($userDetails && $password_match == 1) {
					if($userDetails->status =='0'){
						$response["success"]= false;
						$response["message"]        = "Your Account is not active";

					} else if($userDetails->status=='2'){  
						$response["success"]= false;
						$response["message"]        = "Your Account is BLocked";
					}else if($userDetails->status=='3'){  
						$response["success"]= false;
						$response["message"]        = "Your Account is Deleted";
					} else {

						if($userDetails->phone_verified==0){
							$setting = Setting::first();
							if($setting->sms_enable=='1'){
								$rand_no = rand(10000, 99999);
								$url = 'https://2factor.in/API/V1/'.$setting->sms_key.'/SMS/'.$userData['mobile'].'/'.$rand_no.'&method=get';
								$crl = curl_init();

								curl_setopt($crl, CURLOPT_URL, $url);
								curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
								curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
								$response = curl_exec($crl);

								if(curl_errno($ch)){
									die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
								}
								curl_close($crl);
							}else{
								$rand_no = '12345';
							}
							User::where('mobile',$_REQUEST['mobile'])->update(['device'=>$_REQUEST['device'],$_REQUEST['device']=>$_REQUEST['mobile_token'],'phone_otp'=>$rand_no]);
						}else{
							User::where('mobile',$_REQUEST['mobile'])->update(['device'=>$_REQUEST['device'],$_REQUEST['device']=>$_REQUEST['mobile_token']]);
						}

						$userDetail= User::where('mobile',$_REQUEST['mobile'])->first();
						if($userDetail->country_id>0){
							$country=Allcountry::where('id',$userDetail->country_id)->first();
							$userDetail['country_code']="+".$country->phonecode;
						}else{
							$userDetail['country_code']='';
						}
						$userDetail['name']=trim($userDetail->fname." ".$userDetail->lname);
						$userDetail['user_img']=($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg');
						$userDetail['phone_verified']=$userDetail->phone_verified==0 ? false : true;
						$response["success"]= true;
						$response["message"]='signin successfully';
						$response['user_detail']=$userDetail;
						$status=200;
					}
				}else {
					$response["success"]= false;
					$response["message"]    = "Your mobile number,password combination was incorrect";
				}
			}else {
				$response["success"]= false;
				$response["message"]    = "Your mobile number,password combination was incorrect";
			}


		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postRegister(Request $request){
		$_REQUEST=json_decode($request->getContent(),true);
		$status=400;
		$rules = array(            
			'fname'              =>'required|min:2|max:25',  
			'lname'              =>'required|min:2|max:25',          
			'email'             =>'required|email|unique:users', 
			'mobile'            =>'required|numeric|min:10,mobile|unique:users', 
			'device'            =>'required',
			'mobile_token'      =>'required',
			'password'          => 'required',
			'country_id'		=> 'required'
        // 'confirmpassword' => 'required|same:password'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 
			$userData = $_REQUEST;
			// $userName = explode(' ',$userData['name']); 
			$setting = Setting::first();
			if($setting->sms_enable=='1'){
				$rand_no = rand(10000, 99999);
				$url = 'https://2factor.in/API/V1/'.$setting->sms_key.'/SMS/'.$userData['mobile'].'/'.$rand_no.'&method=get';
				$crl = curl_init();

				curl_setopt($crl, CURLOPT_URL, $url);
				curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
				curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($crl);

				if(curl_errno($ch)){
					die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
				}
				curl_close($crl);
			}else{
				$rand_no = '12345';
			}
			$authen = new User;
			$authen->role           = 'user';
        // $authen->username       = $userData['name'];
			$authen->email          = $userData['email'];
			$authen->fname          = $userData['fname'];
			$authen->lname          = $userData['lname'];
			$authen->country_id		= $userData['country_id'];
			$authen->status         = '0'; 
			$authen->password       = bcrypt($userData['password']);
			$authen->device         = $userData['device'];
			$authen->phone_otp      = $rand_no;
			$authen->mobile         = $userData['mobile'];

			$authen->{$userData['device']}   = $userData['mobile_token'];


			$authen->save();

			$userDetail= User::where('email',$userData['email'])->first();
			if($userDetail->country_id>0){
				$country=Allcountry::where('id',$userDetail->country_id)->first();
				$userDetail['country_code']="+".$country->phonecode;
			}else{
				$userDetail['country_code']='';
			}
			$userDetail['name']=trim($userDetail->fname." ".$userDetail->lname);
			$response["success"]    = true;
			$response["message"]    = "Registered successfully";
			$response['user_detail']=$userDetail;
			$status=200;

		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}


	public function refresh(Request $request) {
		$this->jwt->setToken($this->jwt->getToken());
		return Helper::getResponse(['data' => [
			"token_type" => "Bearer", "expires_in" => (config('jwt.ttl', '0') * 60), "access_token" => $this->jwt->refresh()
		]]);
	}
	public function getPhonenumvalidation(Request $request){
		$status=400;
		$rules = array(  
			'mobile'     =>'required',
			'country_id' =>'required'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		$userDetail=array();
		if ($validator->passes()) { 
			$userDetail= User::where('mobile',$request->mobile)->where('country_id',$request->country_id)->first();
			if($userDetail){
				$response['user_status']=true;
				if($userDetail->phone_verified==0){
					$setting = Setting::first();
					if($setting->sms_enable=='1'){
						$rand_no = rand(10000, 99999);
						$url = 'https://2factor.in/API/V1/'.$setting->sms_key.'/SMS/'.$_REQUEST['mobile'].'/'.$rand_no.'&method=get';
						$crl = curl_init();

						curl_setopt($crl, CURLOPT_URL, $url);
						curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
						curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($crl);

						if(curl_errno($ch)){
							die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
						}
						curl_close($crl);
					}else{
						$rand_no = '12345';
					}
					User::where('mobile',$request->mobile)->update(['phone_otp'=>$rand_no]);
				}
				$response['mobile_verification_status']=$userDetail->phone_verified==0 ? false : true;
			}else{
				$response['user_status']=false;
				$userDetail=[];
			}
			$response["success"]    = true;
			$response["message"]    = "Success";
            // $response['user_detail']=$userDetail;
			$status=200;
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postOtpverification(Request $request){
		$status=400;        
		$_REQUEST=json_decode($request->getContent(),true);
		$rules = array(  
			'mobile'     =>'required',
			'phone_otp'  =>'required'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 
			$userDetail= User::where('mobile',$_REQUEST['mobile'])->first();
			if($userDetail){

                // $userDetail['name']=trim($userDetail->fname." ".$userDetail->lname);
				if($_REQUEST['phone_otp']==$userDetail->phone_otp){
					if($userDetail->phone_verified==0){
                        // $rand_no = '12345';
						User::where('mobile',$_REQUEST['mobile'])->update(['phone_verified'=>'1','status'=>'1']);
					}
					$userDetail= User::where('mobile',$_REQUEST['mobile'])->first();
					$status=200;
					$response['success']=true;
					$response["message"]    = "Success";                    
                    $response['user_detail']=$userDetail;
				}else{
					$response['success']    =false;
					$response["message"]    = "Invalide OTP";
				}

			}else{
				$response['success']    =false;
				$response["message"]    = "Invalide mobile number";
			}
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postForgotpass(Request $request){
		$status=400;        
		$_REQUEST=json_decode($request->getContent(),true);
		$rules = array(  
			'mobile'     =>'required',
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 
			$userDetail= User::where('mobile',$_REQUEST['mobile'])->first();
			if($userDetail){
				if($userDetail->status=='1'){
					
					$setting = Setting::first();
					if($setting->sms_enable=='1'){
						$rand_no = rand(10000, 99999);
						$url = 'https://2factor.in/API/V1/'.$setting->sms_key.'/SMS/'.$_REQUEST['mobile'].'/'.$rand_no.'&method=get';
						$crl = curl_init();

						curl_setopt($crl, CURLOPT_URL, $url);
						curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
						curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($crl);

						if(curl_errno($ch)){
							die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
						}
						curl_close($crl);
					}else{
						$rand_no = '12345';
					}
					


					User::where('mobile',$_REQUEST['mobile'])->update(['phone_otp'=>$rand_no]);
					$status=200;
					$response['success']=true;
					$response["message"]    = "OTP sent successfully";
				}else{
					$response['success']    =false;
					$response["message"]    = "Your account is not active";
				}
			}else{
				$response['success']    =false;
				$response["message"]    = "Invalide Mobile number";
			}
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postChangepass(Request $request)
	{
		$_REQUEST=json_decode($request->getContent(),true);
		$status=400;
		$rules = array(
			'old_password'     =>'required',
			'new_password'     =>'required',
			'user_id'          =>'required'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 

			$userDetails= User::select('active')->where('id',$request->user_id)->where('role','user')->first();
			if($userDetails){
				$password_match = Hash::check($_REQUEST['old_password'], $userDetails->password);
				if ($userDetails && $password_match == 1) {
					if($userDetails->status =='0'){
						$response["success"]= false;
						$response["message"]        = "Your Account is not active";

					} else if($userDetails->status=='2'){  
						$response["success"]= false;
						$response["message"]        = "Your Account is BLocked";
					}else if($userDetails->status=='3'){  
						$response["success"]= false;
						$response["message"]        = "Your Account is Deleted";
					} else {

						\DB::table('users')->where('id',$_REQUEST['user_id'])->update(['new_password'=>Hash::make($_REQUEST['new_password'])]);
						$response["success"]= true;
						$response["message"]='Password updated successfully';
						$status=200;
					}
				}else {
					$response["success"]= false;
					$response["message"]    = "Your mobile old password combination was incorrect";
				}
			}else{
				$response["success"]= false;
				$response["message"]    = "Invalide user";
			}



		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postResetpass(Request $request){

		$_REQUEST=json_decode($request->getContent(),true);
		$status=400;
		$rules = array(
			'password'          =>'required',
			'confirmpassword'   => 'required|same:password',
			'mobile'      =>'required',
			'phone_otp'          => 'required'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 

			$userDetails= User::select('*')->where('mobile',$_REQUEST['mobile'])->where('role','user')->first();
			if($userDetails){
				if($userDetails->country_id>0){
					$country=Allcountry::where('id',$userDetails->country_id)->first();
					$userDetails['country_code']="+".$country->phonecode;
				}else{
					$userDetails['country_code']='';
				}
				$userDetails['name']=trim($userDetails->fname." ".$userDetails->lname);
				if($_REQUEST['phone_otp']==$userDetails->phone_otp){
					User::where('mobile',$_REQUEST['mobile'])->update(['password'=>bcrypt($_REQUEST['password'])]);

					$status=200;
					$response['success']=true;
					$response["message"]    = "password changed successfully";                    
					$response['user_detail']=$userDetails;
				}else{
					$response['success']    =false;
					$response["message"]    = "Invalide OTP";
				}
			}else{
				$response["success"]= false;
				$response["message"]    = "Invalide user";
			}
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function postEditprofile(Request $request){


    // $_REQUEST=json_decode($request->getContent(),true);
		$status=400;
		$rules = array(
			'id'            => 'required',
			'name'          => 'required',
        // 'educational'     => 'required',
			'email'         => 'required',
        	// 'detail'    => 'required',
			// 'address'       => 'required',
        // 'about_you'         => 'required',
        // 'image'         => 'required'
		);      
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) { 
			if(isset($request->user_img) && $request->user_img!='') {
				// $data['user_img']=$this->saveFiles($request);

				$file = $request->file('user_img'); 
				$destinationPath  = public_path('images/user_img/');
				$filename = $file->getClientOriginalName();
				$extension  = $file->getClientOriginalExtension(); 
				$newfilename  = time().'.'.str_replace(' ', '_', $filename);			
				
					$uploadSuccess  = $file->move($destinationPath, $newfilename);
					$data['user_img'] = $newfilename;

			}
			// echo $destinationPath;die();

			$userDetails= User::select('*')->where('id',$request->id)->where('role','user')->first();
			if($userDetails){
				$userName = explode(' ',$request->name); 
				$data['fname']          = isset($userName[0]) ? $userName[0] : '';
				$data['lname']          = isset($userName[1]) ? $userName[1] : '';
				if(isset($request->mobile) && $request->mobile!=''){
					$data['mobile']=$request->mobile;
				}
				$data['email']          =$request->email;
				if(isset($request->address) && $request->address!=''){
					$data['address']        =$request->address;
				}

				if(isset($request->is_new) && $request->is_new!=''){
					$setting = Setting::first();
					if($setting->sms_enable=='1'){
						$rand_no = rand(10000, 99999);
						$url = 'https://2factor.in/API/V1/'.$setting->sms_key.'/SMS/'.$request->mobile.'/'.$rand_no.'&method=get';
						$crl = curl_init();

						curl_setopt($crl, CURLOPT_URL, $url);
						curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
						curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($crl);

						if(curl_errno($ch)){
							die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
						}
						curl_close($crl);
					}else{
						$rand_no = '12345';
					}
					$data['phone_otp']        =$rand_no;
				}


				User::where('id',$request->id)->update($data);
				$userDetail= User::select('id','fname','lname','email','user_img','mobile','address','detail','country_id')->where('id',$request->id)->where('role','user')->first();
				if($userDetail->country_id>0){
					$country=Allcountry::where('id',$userDetail->country_id)->first();
					$userDetail['country_code']="+".$country->phonecode; 
				}else{
					$userDetail['country_code']='';
				}
				
				$userDetail['name']=trim($userDetail->fname." ".$userDetail->lname);
				$userDetail['user_img']=URL::to('/')."/images/user_img/".$userDetail['user_img'];
				$status=200;
				$response['success']=true;
				$response["message"]    = "Updated successfully";                    
				$response['user_detail']=$userDetail;

			}else{
				$response["success"]= false;
				$response["message"]    = "Invalide user";
			}
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function getInstructorProfile(Request $request){
		$status=400;
		$rules = array(
			'author_id'  => 'required',
			'user_id'	 =>'required'
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 
			$coursecontroller = new courseCon;
			$userDetail= User::select('*')->where('id',$_REQUEST['author_id'])->first();
			$sCount=Order::select('id')->where('instructor_id',$_REQUEST['author_id'])->count();
			$cCount=Course::select('id')->where('user_id',$_REQUEST['author_id'])->count();
			$coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$_REQUEST['author_id'])->orderBy('id','DESC')->first();

			$rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
			$rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
			if($rCount>0){
				$reviews_count=number_format(($rCountValue/$rCount),1);
			}else{
				$reviews_count="0.0";
			}
			if($userDetail){
				$author=array(
					'name'=>trim($userDetail->fname." ".$userDetail->lname),
					'about_bio'=>"<!DOCTYPE html><html><head><meta name='viewport' content='width=device-width, initial-scale=1.0'></head><body style='margin: 0; padding: 0;'><div>".$userDetail->detail."</div></body></html>",
					'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
					'no_of_students'=>$sCount,
					'reviews_count'=>$reviews_count,
					'no_of_courses_count'=>$cCount,
					'courses'=>$coursecontroller->authorcourse($_REQUEST['author_id'],$request->user_id)
				);

				$status=200;
				$response['success']=true;
				$response["message"]    = "Instructor profile";
				$response['author']=$author;
			}else{
				$response["success"]= false;
				$response["message"]    = "Invalide user";
			}
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}

	public function getAnnouncement(Request $request){
		$status=400;
		$rules = array(
			'c_id'        => 'required',
			'author_id'   => 'required',
		);      
		$validator = Validator::make($_REQUEST, $rules);
		if ($validator->passes()) { 
		// $request = $this->saveFiles($request);

			$courseDetail= Course::select('*')->where('id',$_REQUEST['c_id'])->where('user_id',$_REQUEST['author_id'])->first();
			// $userDetails= Instructor::select('*')->where('user_id',$_REQUEST['author_id'])->where('role','instructor')->first();
			$userDetails= User::select('*')->where('id',$_REQUEST['author_id'])->first();
			if($courseDetail){
				$announcements=Announcement::where('course_id',$_REQUEST['c_id'])->get();
				if(count($announcements)>0){
					foreach ($announcements as $key => $value) {
						$value->announcement=$value->announsment;
					// $value->description=str_replace(array("\n\r", "\n", "\r","\t","<p>",'</p>'), '',strip_tags($value->description))."Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
						$value->author=array('name'=>trim($userDetails->fname.' '.$userDetails->lname),'avatar'=>($userDetails->avatar!='') ? \URL::to('/public/uploads/'.$userDetails->avatar) : \URL::to('/images/default/user.jpg'));
					}
				}
				$status=200;
				$response['success']=true;
				$response["message"]    = "Instructor profile";
				$response['announcements']=$announcements;
			}else{
				$response["success"]= false;
				$response["message"]    = "Invalide course";
			}
		}  else {
			$response["success"]= false;
			$messages               = $validator->messages();
			$error                  = $messages->getMessages();
			$msg='';
			if(count($error)>0){
				foreach ($error as $key => $value) {
					$msg.=rtrim($value[0],".").",";break;
				}
			}
			$response["message"]    = rtrim($msg,',');
		}    
		return new Response($response, $status);
	}
	public function getPrivacy(Request $request){
		$content="<p>Our Privacy Policy Info: </p><p>
		Abservetech uses the latest technologies and advanced version of CSS, HTML 5, JavaScript to develop the alluring front end with a user-friendly interface, content delivery, visual designs, website performance, mobile compatibility for the website to entice the users.</p>";


		$status=200;
		$response['success']=true;
		$response["message"]    = "Privacy";
		$response['content']=$content;
		return new Response($response, $status);
	}

	public function getTerms(Request $request){
		$content="<p>General Terms Of Work & Responsibility Of Clients:</p>

		<p>We provide a lot of importance to client refund policy at ABSERVETECH. We take a considerable policy to protect the scripts and products of our company.</p>

		<p>Data back-up is entirely the responsibility of the client. ABSERVETECH is not responsible for any loss of content due to any reason or circumstance.</p>

		<p>ABSERVETECH does not assume responsibilities for any changes caused by the client or a third-party. These could include but would not be limited to deletions, modifications or additions. However, ABSERVETECH could be willing to rectify these for an additional charge.</p>

		<p>Information We collect clearly provide all information for our client. Personally, identifiable information is never used for purposes that are not related to the above without your consent and you are provided a window to opt-out of such use.</p>

		<p>Name of the Organization and Contact Person</p>
		<p>Address</p>
		<p>Phone no</p>
		<p>E-Mail</p>";


		$status=200;
		$response['success']=true;
		$response["message"]    = "Terms";
		$response['content']=$content;
		return new Response($response, $status);
	}
	public function getAbout(Request $request){
		$content="<p>A Complete Web and Mobile App Development Company Offers Uber Clone, Vacation Rental Script, Swiggy Clone, Udemy Clone, OLX Clone, Monster Clone, Tinder Clone, UberEats Clone, etc</p>";


		$status=200;
		$response['success']=true;
		$response["message"]    = "Terms";
		$response['content']=$content;
		return new Response($response, $status);
	}
	public function getCountry(Request $request){
		$country=Allcountry::get();


		$status=200;
		$response['success']=true;
		$response["message"]="Country";
		$response['country']=$country;
		return new Response($response, $status);
	}

	public function getLandingpage(Request $request){
		$country=Allcountry::get();
		$social=Setting::select('fb_login_enable','google_login_enable')->first();
		$onboard=\DB::table('onboard')->get();
		if(count($onboard)>0){
			foreach ($onboard as $key => $value) {
				$value->image=\URL::to('/images/onboard/'.$value->image);
			}
		}
		$landing_page=array(
			'onboard'=>$onboard,
			'social'=>array('facebook'=>($social->fb_login_enable=='1') ? true : false,'google'=>($social->google_login_enable=='1') ? true : false),
			'country'=>$country
		);
		$status=200;
		$response['success']=true;
		$response["message"]="Landing Page";
		// $response['country']=$country;
		// $response['social']=$social;
		// $response['onboard']=$onboard;
		$response['landing_page']=$landing_page;
		return new Response($response, $status);
	}
	public function postLiveclass(Request $request){
		$live_class_url=\URL::to('/liveclassapp/edustar_1@'.time());


		$status=200;
		$response['success']=true;
		$response["message"]="Live class";
		$response['live_class_url']=$live_class_url;
		return new Response($response, $status);
	}
	public function getPaymentgateway(Request $request){
		$social=Setting::select('stripe_enable','instamojo_enable','paypal_enable','paytm_enable','braintree_enable','razorpay_enable','paystack_enable')->first();
		
		$payment_gateway[]=array(
			'title'=>'Stripe',
			'active'=>($social->stripe_enable=='1') ? true : false,
			'api_key'=>env('STRIPE_KEY'),
			'secret_key'=>env('STRIPE_SECRET')
		);
		// $payment_gateway[]=array(
		// 	'title'=>'Instamojo',
		// 	'active'=>($social->instamojo_enable=='1') ? true : false,
		// 	'api_key'=>env('IM_API_KEY'),
		// 	'secret_key'=>'',
		// 	'token'=>env('IM_AUTH_TOKEN'),
		// 	'url'=>env('IM_URL')
		// );
		$payment_gateway[]=array(
			'title'=>'Paypal',
			'active'=>($social->paypal_enable=='1') ? true : false,
			'api_key'=>env('PAYPAL_CLIENT_ID'),
			'secret_key'=>env('PAYPAL_SECRET')
		);
		$payment_gateway[]=array(
			'title'=>'Razorpay',
			'active'=>($social->razorpay_enable=='1') ? true : false,
			'api_key'=>env('RAZORPAY_KEY'),
			'secret_key'=>env('RAZORPAY_SECRET')
		);
		$status=200;
		$response['success']=true;
		$response["message"]="Payment gateway";
		$response['payment_gateway']=$payment_gateway;
		return new Response($response, $status);
	}
}