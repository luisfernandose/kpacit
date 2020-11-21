<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;

use Validator, Input, Redirect;
use Lcobucci\JWT\Parser; 
use App\User;
use App\Tb_Courses;
use App\Tb_Purchased_Course;
use App\Announcements;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
// use  Auth;

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
            $userDetails= User::where('id',$request->user_id)->first();
            $userDetails['name']=trim($userDetails->name." ".$userDetails->last_name);
            if($userDetails && $userDetails->role_id=='2'){
                $response["success"]= true;
                $response["message"]='success';
                $response['user_detail']=$userDetails; 
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
    // echo "string";exit();
    // $_REQUEST=json_decode($request->getContent(),true);
    $status = 400;
    $rules = array(
        'email'     =>'required',
        'password'  =>'required',
        'role'      =>'required',
    );      
    $validator = Validator::make($request->all(), $rules);
    if ($validator->passes()) { 

        $userDetails= User::where('role_id',$request->role)->where('email',$request->email)->first();
        if($userDetails){
        $password_match = Hash::check($request->password, $userDetails->password);
        if ($userDetails && $password_match == 1) {
            $credentials['email'] = $request->email;
            $credentials['password'] = $request->password;
            $token = \Auth::attempt($credentials);
            // echo '<pre>';print_r($token);exit();
            // $token = auth()->login($userDetails); 
            // $token='ssss';
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

                $userDetail= User::where('email',$request->email)->first();                
                $userDetail['name']=trim($userDetail->name." ".$userDetail->last_name);
                $token = 'Bearer '.$token;
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
        // echo json_encode($response);exit();
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
        'mobile_number' =>'required'
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

            $authCheck = User::where('email',$userData['email'])->where('role_id','2')->exists();

            if($authCheck == false){

                $userName = explode(' ',$userData['name']); 

                $authen = new User;
                $authen->role_id        = 2;
                $authen->username       = $userData['name'];
                $authen->email          = $userData['email'];
                $authen->name           = isset($userName[0]) ? $userName[0] : '';
                $authen->last_name      = isset($userName[1]) ? $userName[1] : 
                $authen->active         = '1';
                $authen->device         = $userData['device'];
                $authen->{$userData['device']}   = $userData['mobile_token'];

                $authen->save();

                $status=200;
            }else{
                User::where('email',$userData['email'])->update(array($userData['device']=>$userData['mobile_token']));
            }       

            $where = 'email';
            $whereVal = $userData['email'];

        }elseif($userData['from'] == 'facebook'){

            $authCheck = User::where('socialmediaImg',$userData['imageURL'])->where('role_id','2')->exists();

            if($authCheck == false){
                $userName = explode(' ',$userData['name']);
                $authen = new User;
                $authen->role_id        = 2;
                $authen->username       = $userData['name'];
                $authen->name     = isset($userName[0]) ? $userName[0] : '';
                $authen->last_name      = isset($userName[1]) ? $userName[1] : '';
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
        }




        $userDetails= User::where('role_id','2')->where($where,$whereVal)->first();

        if ($userDetails) {

            $userDetails['name']=trim($userDetails->name." ".$userDetails->last_name);
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
        'mobile_number'     =>'required',
        'password'          =>'required',
        'role'              =>'required',           
        'device'            =>'required',           
        'mobile_token'      =>'required',
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 

        $userDetails= User::select('active','password')->where('role_id',$_REQUEST['role'])->where('phone_number',$_REQUEST['mobile_number'])->first();
        $password_match = Hash::check($_REQUEST['password'], $userDetails->password);
        if ($userDetails && $password_match == 1) {
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

                if($userDetails->phone_verified==0){
                    $rand_no = '12345';
                    User::where('phone_number',$_REQUEST['mobile_number'])->update(['device'=>$_REQUEST['device'],$_REQUEST['device']=>$_REQUEST['mobile_token'],'phone_otp'=>$rand_no]);
                }else{
                    User::where('phone_number',$_REQUEST['mobile_number'])->update(['device'=>$_REQUEST['device'],$_REQUEST['device']=>$_REQUEST['mobile_token']]);
                }

                $userDetail= User::where('phone_number',$_REQUEST['mobile_number'])->first();

                $userDetail['name']=trim($userDetail->name." ".$userDetail->last_name);
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
        'name'              =>'required',           
        'email'             =>'required|email|unique:users', 
        'phone_number'      =>'required|numeric|min:10,phone_number|unique:users', 
        'device'            =>'required',
        'mobile_token'      =>'required',
        'password'          => 'required',
        // 'confirmpassword' => 'required|same:password'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $userData = $_REQUEST;
        $userName = explode(' ',$userData['name']); 
        $rand_no = '12345';
        $authen = new User;
        $authen->role_id        = 2;
        $authen->username       = $userData['name'];
        $authen->email          = $userData['email'];
        $authen->name           = isset($userName[0]) ? $userName[0] : '';
        $authen->last_name      = isset($userName[1]) ? $userName[1] : 
        $authen->active         = '0'; 
        $authen->password       = bcrypt($userData['password']);
        $authen->device         = $userData['device'];
        $authen->phone_otp      =$rand_no;
        $authen->phone_number   =$userData['phone_number'];

        $authen->{$userData['device']}   = $userData['mobile_token'];


        $authen->save();

        $userDetail= User::where('email',$request->email)->first();

        $userDetail['name']=trim($userDetail->name." ".$userDetail->last_name);
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

        $newToken = auth()->refresh(true, true);
        $res['id'] = 1;
        $res['token'] = 'Bearer '.$newToken;
        $status = 200;

        return new Response($res,  $status);
    }

    public function getPhonenumvalidation(Request $request){
        $status=400;
        $rules = array(  
            'phone_number'     =>'required',
        );      
        $validator = Validator::make($_REQUEST, $rules);
        $userDetail=array();
        if ($validator->passes()) { 
            $userDetail= User::where('phone_number',$request->phone_number)->first();
            if($userDetail){
                $response['user_status']=true;
                if($userDetail->phone_verified==0){
                    $rand_no = '12345';
                    User::where('phone_number',$request->phone_number)->update(['phone_otp'=>$rand_no]);
                }
                $response['mobile_verification_status']=$userDetail->phone_verified==0 ? false : true;;
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
            'phone_number'     =>'required',
            'phone_otp'        =>'required'
        );      
        $validator = Validator::make($_REQUEST, $rules);
        if ($validator->passes()) { 
            $userDetail= User::where('phone_number',$_REQUEST['phone_number'])->first();
            if($userDetail){

                $userDetail['name']=trim($userDetail->name." ".$userDetail->last_name);
                if($request->phone_otp==$userDetail->phone_otp){
                    if($userDetail->phone_verified==0){
                        // $rand_no = '12345';
                        User::where('phone_number',$_REQUEST['phone_number'])->update(['phone_verified'=>'1','active'=>1]);
                    }
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
            'phone_number'     =>'required',
        );      
        $validator = Validator::make($_REQUEST, $rules);
        if ($validator->passes()) { 
            $userDetail= User::where('phone_number',$_REQUEST['phone_number'])->first();
            if($userDetail){
                if($userDetail->active=='1'){
                // $to = $_REQUEST['email'];
                // $subject = CNF_APPNAME." : Reset password";
                // $data['firstname'] = $userDetail->name;            
                // $data['id']        = $userDetail->id;
                // \Mail::send('emails.forgotpassword', $data,function($message)use ($to,$subject) {
                //     $message->to($to)->subject($subject);
                //     $message->from(CNF_EMAIL,CNF_APPNAME);
                // }); 

                    $rand_no = '12345';
                    User::where('phone_number',$_REQUEST['phone_number'])->update(['phone_otp'=>$rand_no]);
                    $status=200;
                    $response['success']=true;
                    $response["message"]    = "OTP sent successfully";
                }else{
                    $response['success']    =false;
                    $response["message"]    = "Your account is not active";
                }
            }else{
                $response['success']    =false;
                $response["message"]    = "Invalide mail id";
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

        $userDetails= User::select('active')->where('id',$request->user_id)->where('role_id','2')->first();
        if($userDetails){
        $password_match = Hash::check($_REQUEST['old_password'], $userDetails->password);
        if ($userDetails && $password_match == 1) {
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
        'phone_number'      =>'required',
        'phone_otp'          => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 

        $userDetails= User::select('*')->where('phone_number',$_REQUEST['phone_number'])->where('role_id','2')->first();
        if($userDetails){

            $userDetails['name']=trim($userDetails->name." ".$userDetails->last_name);
           if($_REQUEST['phone_otp']==$userDetails->phone_otp){
                User::where('phone_number',$_REQUEST['phone_number'])->update(['password'=>bcrypt($_REQUEST['password'])]);
          
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
        // 'professional'    => 'required',
        'address'       => 'required',
        // 'about_you'         => 'required',
        // 'image'         => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $request = $this->saveFiles($request);

        $userDetails= User::select('*')->where('id',$_REQUEST['id'])->where('role_id','2')->first();
        if($userDetails){

                $data['name']           =$request->name;
                $data['educational']    =$request->educational;
                $data['email']          =$request->email;
                $data['professional']   =$request->professional;
                $data['address']        =$request->address;
                $data['about_you']      =$request->about_you;
                if(isset($request->avatar) && $request->avatar!=''){
                   $data['avatar']      =$request->avatar; 
                }

                User::where('id',$_REQUEST['id'])->update($data);
          $userDetail= User::select('*')->where('id',$_REQUEST['id'])->where('role_id','2')->first();

            $userDetail['name']=trim($userDetail->name." ".$userDetail->last_name);
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
        'author_id'            => 'required',
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $request = $this->saveFiles($request);

        $userDetails= User::select('*')->where('id',$_REQUEST['author_id'])->where('role_id','4')->first();
        if($userDetails){
        $list_of_courses=Tb_Courses::where('teacher_id',$_REQUEST['author_id'])->where('status','Accept')->get();
        if(count($list_of_courses)>0){
        	foreach ($list_of_courses as $key => $value) {
        		$value->title=\Helper::getLangValue($value->title);
        		$value->tag=\Helper::getLangValue($value->tag);
        		$value->requirements=str_replace(array("\n\r", "\n", "\r","\t","<p>",'</p>'), '',strip_tags(\Helper::getLangValue($value->requirements)));
        		$value->summary=str_replace(array("\n\r", "\n", "\r","\t","<p>",'</p>'), '',strip_tags(\Helper::getLangValue($value->summary)));
        		$value->promo_video=\URL::to('/public/uploads/'.$value->promo_video);
        		$value->image=\URL::to('/public/uploads/'.$value->image);
        	}
        }
        $list_of_courses_id=Tb_Courses::select(\DB::raw('GROUP_CONCAT(id) as ids'))->where('teacher_id',$_REQUEST['author_id'])->where('status','Accept')->first();


         $reviews=\DB::table('tb_reviews')->select(\DB::raw('count(id) as cnt, sum(ratings) as rating'))->whereIN('course_id',explode(",", $list_of_courses_id->ids))->first();
         $stu_count=Tb_Purchased_Course::select('id')->where('teacher_id',$_REQUEST['author_id'])->count();
            $author=array(
                'name'=>trim($userDetails->name.' '.$userDetails->last_name),
                'role'=>($userDetails->professional!='') ? $userDetails->professional : '',
                'no_of_courses_count'=>count($list_of_courses),
                'detailed_bio'=>($userDetails->about_you!='') ? $userDetails->about_you : '',
                'reviews'=>($reviews && $reviews->rating>0) ? $reviews->rating/$reviews->cnt : 0,
                'stu_count'=>($stu_count && $stu_count>0) ? $stu_count : 0,
                'courses'=>$list_of_courses,
                'avatar'=>($userDetails->avatar!='') ? \URL::to('/public/uploads/'.$userDetails->avatar) : \URL::to('/abserve/img/user.png')
                    );
          
            $status=200;
            $response['success']=true;
            $response["message"]    = "Question Answer";
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
		'c_id'            => 'required',
		'author_id'            => 'required',
		);      
	$validator = Validator::make($_REQUEST, $rules);
	if ($validator->passes()) { 
		$request = $this->saveFiles($request);

		$courseDetail= Tb_Courses::select('*')->where('id',$_REQUEST['c_id'])->where('teacher_id',$_REQUEST['author_id'])->first();
		$userDetails= User::select('*')->where('id',$_REQUEST['author_id'])->where('role_id','4')->first();
		if($courseDetail){
			$announcements=Announcements::where('c_id',$_REQUEST['c_id'])->get();
			if(count($announcements)>0){
				foreach ($announcements as $key => $value) {
					$value->description=str_replace(array("\n\r", "\n", "\r","\t","<p>",'</p>'), '',strip_tags($value->description))."Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
					$value->author=array('name'=>trim($userDetails->name.' '.$userDetails->last_name),'avatar'=>($userDetails->avatar!='') ? \URL::to('/public/uploads/'.$userDetails->avatar) : \URL::to('/abserve/img/user.png'));
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
}