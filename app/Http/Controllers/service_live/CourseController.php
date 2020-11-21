<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;

use Validator, Input, Redirect;
use App\Categories;
use App\User;


use App\Order;
use App\Cart;
use App\Course;
use App\Currency;
use App\CourseInclude;
use App\WhatLearn;
use App\CourseChapter;
use App\RelatedCourse;
use App\CourseClass;
use App\Wishlist;
use App\ReviewRating;
use App\Question;
use App\Answer;
use Notification;
use App\Notifications\UserEnroll;
use Carbon\Carbon;
use App\InstructorSetting;
use App\PendingPayout;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use DateTime;

class CourseController extends Controller
{

    public function getCategory(Request $request)
    {

        $category= Categories::select('id','title','icon')->where('status','1')->orderByRaw("RAND()")->limit(6)->get();
        $slider= Slider::select('image')->where('status','1')->get();
        if(count($slider)>0){
            foreach ($slider as $key => $value) {
                $value->image=\URL::to('images/slider/'.$value->image);
            }
        }
        $category_banner=array(
            'categories'=>$category,
            'sliders'=>$slider
        );
        $response["success"]= true;
        $response["message"]='success';
        $response['category_banner']=$category_banner; 
        $status = 200;
        return new Response($response, $status);

    }
    public function getCoursesearch(Request $request){
         $status = 400; 
        $rules = array(
            'keyword' =>'required',
            'user_id' =>'required'
        );      
        $validator = Validator::make($_REQUEST, $rules);
        if ($validator->passes()) { 
            $status = 200;   
            $course_count=Order::select(\DB::raw('group_concat(course_id) as ids'))->where('user_id',$request->user_id)->orderBy('orders.id','DESC')->first();

            $courses= Course::select('id','title','preview_image','price','discount_price','user_id')->where('title', 'like', '%' . $request->keyword . '%')->where('status','1')->get();
            foreach ($courses as $keyS => $valueS) {
                $valueS->course_url=\URL::to("/")."/course/".$valueS->id."/".str_replace(" ","-",$valueS->title);
                $valueS->order_id=0;
                $valueS->type=($valueS->type==1) ? 'paid' : 'free';
                if($course_count->ids!=''){
                    if(in_array($valueS->id,explode(",", $course_count->ids))){
                       $valueS->enrolled=true;
                   }else{
                       $valueS->enrolled=false;
                   }
               }else{
                   $valueS->enrolled=false;
               }
               if($valueS->preview_image!=''){
                $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
            }else{
                $valueS->preview_image=\URL::to('uploads/no-img.jpg');
            }
            $valueS->currency=$this->current();
            $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueS->user_id)->first();
            $sCount=Order::select('id')->where('instructor_id',$valueS->user_id)->where('course_id',$valueS->id)->count();
            $cCount=Course::select('id')->where('user_id',$valueS->user_id)->count();
            $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$valueS->user_id)->orderBy('id','DESC')->first();

            $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
            $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
            if($rCount>0){
                $reviews_count=number_format(($rCountValue/$rCount),1);
            }else{
                $reviews_count="0.0";
            }
            $valueS->author=array(
                'name'=>trim($userDetail->fname." ".$userDetail->lname),
                'about_bio'=>$userDetail->detail,
                'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                'no_of_students'=>$sCount,
                'reviews_count'=>$reviews_count,
                'no_of_courses_count'=>$cCount
            );
            $learn = 0;$price = 0;$value = 0;$sub_total = 0;$overallrating=0;
            $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
            $count =  count($reviews);
            if($count>0){
               foreach($reviews as $review){
                $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
                $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
                $learn = $review->learn*5;
                $price = $review->price*5;
                $value = $review->value*5;
                $sub_total = $sub_total + $learn + $price + $value;
            } 
        }
        $count = ($count*3) * 5;
        if($count != ""){
            $rat = $sub_total/$count;
            $ratings_var = ($rat*100)/5;
            $overallrating = ($ratings_var/2)/10;
        }
        $valueS->reviews=$reviews;
        $valueS->avg_rating=round($overallrating, 1);
        }
        $response["success"]= true;
        $response["message"]='success';
        $response['courses']=$courses; 
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
public function getCoursedetail(Request $request){
    $status = 400; 
        $rules = array(
            'course_id' =>'required',
            'user_id' =>'required'
        );      
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {

        $status = 200;        
        $ratings=0;
        $valueS= Course::select('id','user_id','title','slug','short_detail','detail','requirement','price','discount_price','preview_type','video','url','preview_image')->where('id',$request->course_id)->where('status','1')->first();
        $duration=0;
        if($valueS) {
            $valueS->course_url=\URL::to("/")."/course/".$valueS->id."/".$valueS->slug;
            $valueS->type=($valueS->type==1) ? 'paid' : 'free';
            $course_count=Order::select('course_id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->orderBy('orders.id','DESC')->first();
            $valueS->enrolled=($course_count)? true : false;
            if($valueS->preview_image!=''){
                $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
            }else{
                $valueS->preview_image=\URL::to('uploads/no-img.jpg');
            }
            if($valueS->preview_type='video'){
                $valueS->video=\URL::to('video/preview/'.$valueS->video);
            }else{
                $urlSample=$valueS->url;
                if($urlSample!=''){
                    if(strpos($urlSample, 'vimeo.com')>=0){
                        $valueS->preview_type=='vimeo';
                        $vimeoID=explode("vimeo.com/video", $urlSample)[1];

                        $url = "https://player.vimeo.com/video/".$vimeoID."/config";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        $response11 = curl_exec($ch);
                        curl_close($ch);
                        $response_a = json_decode($response11, true);

                        $valueS->video=$response_a['request']['files']['progressive'];
                    }
                }
            }
            $valueS->currency=$this->current();
            $cart_cId= Cart::select('course_id','id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
            $valueS->cart=($cart_cId) ? true : false;
            $valueS->cart_id=($cart_cId) ? (int)$cart_cId->id : 0;
            $wishlists= \DB::table('wishlists')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
            $valueS->wishlist=($wishlists) ? true : false;
            
        $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueS->user_id)->first();
        $sCount=Order::select('id')->where('instructor_id',$valueS->user_id)->where('course_id',$valueS->id)->count();
        $cCount=Course::select('id')->where('user_id',$valueS->user_id)->count();
        $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$valueS->user_id)->orderBy('id','DESC')->first();

        $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
        $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
        if($rCount>0){
            $reviews_count=number_format(($rCountValue/$rCount),1);
        }else{
            $reviews_count="0.0";
        }
        $valueS->author=array(
            'name'=>trim($userDetail->fname." ".$userDetail->lname),
            'about_bio'=>$userDetail->detail,
            'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
            'no_of_students'=>$sCount,
            'reviews_count'=>$reviews_count,
            'no_of_courses_count'=>$cCount
        );
        $valueS->benefits = WhatLearn::select('detail')->where('course_id','=',$valueS->id)->get();

        $valueS->courseinclude = CourseInclude::where('course_id','=',$valueS->id)->get();
        $coursechapters = CourseChapter::select('id','chapter_name')->where('course_id','=',$valueS->id)->limit(5)->get();
        $duration=0;
        foreach ($coursechapters as $cKey => $cValue) {
            $courseclass = CourseClass::select('title','type','preview_type','preview_video','preview_url')->where('course_id',$valueS->id)->where('coursechapter_id',$cValue->id)->get();
            foreach ($courseclass as $ccKey => $ccValue) {
                if($ccValue->url != ''){
                    $ccValue->video = str_replace("https://youtu.be/", "https://youtube.com/watch?v=", $ccValue->url);
                }else{
                    $ccValue->video = url('video/class/'.$ccValue->video);
                }

                if($ccValue->type =='video'){
                    if($ccValue->duration>0){
                        $duration=$duration+$ccValue->duration;
                    }

                }
            }
            $cValue->courseclass=$courseclass;
        }
        $valueS->coursechapters=$coursechapters;
        $valueS->course_includes=array('total_hours'=>date('H:i', mktime(0,$duration)),'articles'=>rand(pow(10, 0), pow(10, 1)-1));

        $learn = 0;
        $price = 0;
        $value = 0;
        $sub_total = 0;
        $overallrating=0;
        $reviews = ReviewRating::select('user_id','learn','price','value','review')->where('course_id','=',$valueS->id)->get();
        $count =  count($reviews);
        if($count>0){
           foreach($reviews as $review){
             $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
             $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
             $learn = $review->learn*5;
             $price = $review->price*5;
             $value = $review->value*5;
             $sub_total = $sub_total + $learn + $price + $value;
         } 
     }


     $count = ($count*3) * 5;

     if($count != "")
     {
        $rat = $sub_total/$count;

        $ratings_var = ($rat*100)/5;

        $overallrating = ($ratings_var/2)/10;
    }
    $valueS->reviews=$reviews;
    $valueS->avg_rating=round($overallrating, 1);


}
$response["success"]= true;
$response["message"]='success';
$response['course_detail']=$valueS; 

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
public function getCourse(Request $request){
    $status = 200; 
    $categoryDet= Categories::select('id','title','icon')->get();
    $ratings=0;
    $catCount=0;
    $data=[];
    foreach ($categoryDet as $keyC => $valueC) {

        $courseDET= Course::select('category_id')->where('category_id',$valueC->id)->where('status','1')->count();
        if($courseDET>0){
            if($catCount==5){ break; }
            $courses= Course::select('id','title','preview_image','price','discount_price')->where('category_id',$valueC->id)->where('status','1')->orderByRaw("RAND()")->limit(10)->get();
            foreach ($courses as $keyS => $valueS) {
                $valueS->type=($valueS->type==1) ? 'paid' : 'free';
                $course_count=Order::select('course_id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->orderBy('orders.id','DESC')->first();
                $valueS->enrolled=($course_count)? true : false;  
                $valueS->currency=$this->current();
                if($valueS->preview_image!=''){
                    $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
                }else{
                    $valueS->preview_image=\URL::to('uploads/no-img.jpg');
                }
                $learn = 0;
                $price = 0;
                $value = 0;
                $sub_total = 0;
                $overallrating=0;
                $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
                $count =  count($reviews);
                if($count>0){
                 foreach($reviews as $review){
                    $learn = $review->learn*5;
                    $price = $review->price*5;
                    $value = $review->value*5;
                    $sub_total = $sub_total + $learn + $price + $value;
                } 
            }
            $count = ($count*3) * 5;
            if($count != ""){
                $rat = $sub_total/$count;
                $ratings_var = ($rat*100)/5;
                $overallrating = ($ratings_var/2)/10;
            }
            $valueS->avg_rating=round($overallrating, 1);
        }
        $catCount++;
        $data[]=array(
            'id'=>$valueC->id,
            'title'=>$valueC->title,
            'icon'=>$valueC->icon,
            'courses'=>$courses
        );
    }
}
$response["success"]= true;
$response["message"]='success';
$response['course_categories']=$data; 

return new Response($response, $status);
}
public function getMycourse(Request $request)
{  
    $status = 400;
    $ratings=0;
    $rules = array(
        'user_id' =>'required',
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
     $data['perPage']   = 10;
     if(isset($request->page) && $request->page)
        $data['page']   = ($request->page-1)*$data['perPage'];
    else
        $data['page']   = (1-1)*$data['perPage'];
    $course_count=Order::select('id')->where('user_id',$request->user_id)->orderBy('orders.id','DESC')->count();
    $courses=Course::select('courses.id','courses.title','courses.user_id','courses.preview_image','orders.id as order_id')->join('orders','courses.id','=','orders.course_id')->where('orders.user_id',$request->user_id)->orderBy('orders.id','DESC')->skip($data['page'])->take($data['perPage'])->get();

    $cid=array();
    if(count($courses)>0){
        foreach ($courses as $keyS => $valueS) {
            if($valueS->preview_image!=''){
                $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
            }else{
                $valueS->preview_image=\URL::to('uploads/no-img.jpg');
            }
            $userDetail= User::select('id','fname','lname')->where('id',$valueS->user_id)->first();
            $valueS->author=array(
                'name'=>trim($userDetail->fname." ".$userDetail->lname)
            );
        }
    }else{
    $courses=[];
}

$response["success"]= true;
$response["message"]='success';
$response['course']=$courses;
$data['count']     = $course_count;
$status = 200;
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

public function getWishlist(Request $request)
{  
    $status = 400;
    $ratings=0;
    $rules = array(
        'user_id' =>'required',
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $data['perPage']   = 10;
        if(isset($request->page) && $request->page)
            $data['page']   = ($request->page-1)*$data['perPage'];
        else
            $data['page']   = (1-1)*$data['perPage'];

        $courses= Course::select('courses.id','courses.title','courses.user_id','courses.preview_image','courses.price','courses.discount_price')->join('wishlists','courses.id','=','wishlists.course_id')->where('wishlists.user_id',$_REQUEST['user_id'])->orderBy('wishlists.id','DESC')->skip($data['page'])->take($data['perPage'])->get();
        
        if(count($courses)>0){
          $duration=0;
          foreach ($courses as $keyS => $valueS) {
                $valueS->type=($valueS->type==1) ? 'paid' : 'free';
                $course_count=Order::select('course_id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->orderBy('orders.id','DESC')->first();
                $valueS->enrolled=($course_count)? true : false;
                $valueS->currency=$this->current();
                $cart_cId= Cart::select('course_id','id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
                $valueS->cart=($cart_cId) ? true : false;
                $valueS->cart_id=($cart_cId) ? (int)$cart_cId->id : 0;
                $wishlists= \DB::table('wishlists')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
                $valueS->wishlist=($wishlists) ? true : false;
               if($valueS->preview_image!=''){
                    $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
                }else{
                    $valueS->preview_image=\URL::to('uploads/no-img.jpg');
                }
        $userDetail= User::select('id','fname','lname')->where('id',$valueS->user_id)->first();        
        $valueS->author=array(
            'name'=>trim($userDetail->fname." ".$userDetail->lname));
        
        $learn = 0;
        $price = 0;
        $value = 0;
        $sub_total = 0;
        $overallrating=0;
        $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
        $count =  count($reviews);
        if($count>0){
         foreach($reviews as $review){
           $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
           $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
           $learn = $review->learn*5;
           $price = $review->price*5;
           $value = $review->value*5;
           $sub_total = $sub_total + $learn + $price + $value;
       } 
   }


   $count = ($count*3) * 5;

   if($count != "")
   {
    $rat = $sub_total/$count;

    $ratings_var = ($rat*100)/5;

    $overallrating = ($ratings_var/2)/10;
}
$valueS->reviews_count=$count;
$valueS->avg_rating=round($overallrating, 1);


}

}else{
    $courses=[];
}

$response["success"]= true;
$response["message"]='success';
$response['course']=$courses;
$status = 200;
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
public function postWishlistAddEdit(Request $request)
{  
    $_REQUEST=json_decode($request->getContent(),true);
    $status = 400;
    $rules = array(
        'user_id' =>'required',
        'c_id'=>'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $wishlists= \DB::table('wishlists')->where('user_id',$_REQUEST['user_id'])->where('course_id',$_REQUEST['c_id'])->first();
        if($wishlists){
            \DB::table('wishlists')->where('user_id',$_REQUEST['user_id'])->where('course_id',$_REQUEST['c_id'])->delete();
            $response["message"]='Wishlist removed successfully';
            $response['wishlist']=false;
        }else{
            $data=array('user_id'=>$_REQUEST['user_id'],'course_id'=>$_REQUEST['c_id']);
            \DB::table('wishlists')->insert($data);
            $response["message"]='Wishlist added successfully';
            $response['wishlist']=true;
        }

        $response["success"]= true;
        $status = 200;
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
public function postWishlistremove(Request $request)
{  
    $_REQUEST=json_decode($request->getContent(),true);
    $status = 400;
    $rules = array(
        'user_id' =>'required',
        'c_id'=>'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $wishlists= \DB::table('wishlists')->where('user_id',$_REQUEST['user_id'])->where('course_id',$_REQUEST['c_id'])->first();
        if($wishlists){
            \DB::table('wishlists')->where('user_id',$_REQUEST['user_id'])->where('course_id',$_REQUEST['c_id'])->delete();
            $response["message"]='Wishlist removed successfully';
            $response['wishlist']=false;
        }else{
            $response["message"]='Wishlist removed successfully';
            $response['wishlist']=false;
        }

        $response["success"]= true;
        $status = 200;
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

public function postBuyNowFree(Request $request)
{  
    $_REQUEST=json_decode($request->getContent(),true);
    $status = 400;
    $rules = array(
        'user_id' =>'required',
        'course_id'=>'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) {
        $course = Course::where('id', $_REQUEST['course_id'])->first();

        \DB::table('orders')->insert(
            array(
                'user_id' => $_REQUEST['user_id'],
                'instructor_id' => $course->user_id,
                'course_id' => $_REQUEST['course_id'],
                'total_amount' => 'Free',
                'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
            )
        );
        $status=200;
        $response['success']=true;
        $response["message"]    = "Payment success";
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

public function postDeleteCourse(Request $request){
    $_REQUEST=json_decode($request->getContent(),true);
    $status = 400;
    $rules = array(
        'user_id' =>'required',
        'o_id'=> 'required',
        'c_id'=>'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $tb_purchased_course= Order::where('user_id',$_REQUEST['user_id'])->where('course_id',$_REQUEST['c_id'])->where('id',$_REQUEST['o_id'])->first();
        if($tb_purchased_course){
            Order::where('user_id',$_REQUEST['user_id'])->where('course_id',$_REQUEST['c_id'])->where('id',$_REQUEST['o_id'])->delete();
            $response["message"]='Course removed successfully';
        }else{
            $response["message"]='Invalide course';
        }

        $response["success"]= true;
        $status = 200;
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
public function getCategoryBasedCourse(Request $request)
{  
    $status = 400;
    $ratings=0;
    $rules = array(
        'user_id'   =>'required',
        'c_id'      =>'required',        
        'page'      =>'required',
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
     $data['perPage']   = 10;
     if(isset($request->page) && $request->page)
        $data['page']   = ($request->page-1)*$data['perPage'];
    else
        $data['page']   = (1-1)*$data['perPage'];
    $courses= Course::select('id','title','user_id','preview_image','price','discount_price')->where('category_id',$request->c_id)->where('status','1')->skip($data['page'])->take($data['perPage'])->get();
    $cid=array();
    $course_count1=Order::select('course_id')->where('user_id',$request->user_id)->count();
    if(count($courses)>0){
        $duration=0;
        foreach ($courses as $keyS => $valueS) {
            $valueS->type=($valueS->type==1) ? 'paid' : 'free';         
            $course_count=Order::select('course_id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->orderBy('orders.id','DESC')->first();
            $valueS->enrolled=($course_count)? true : false; 
            $valueS->currency=$this->current();
            
            if($valueS->preview_image!=''){
                $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
            }else{
                $valueS->preview_image=\URL::to('uploads/no-img.jpg');
            }
            $userDetail= User::select('id','fname','lname')->where('id',$valueS->user_id)->first();        
            $valueS->author=array('name'=>trim($userDetail->fname." ".$userDetail->lname));

$duration=0;
$learn = 0;
$price = 0;
$value = 0;
$sub_total = 0;
$overallrating=0;
$reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
$count =  count($reviews);
if($count>0){
 foreach($reviews as $review){
   $learn = $review->learn*5;
   $price = $review->price*5;
   $value = $review->value*5;
   $sub_total = $sub_total + $learn + $price + $value;
} 
}
$count = ($count*3) * 5;
if($count != ""){
    $rat = $sub_total/$count;
    $ratings_var = ($rat*100)/5;
    $overallrating = ($ratings_var/2)/10;
}
$valueS->avg_rating=round($overallrating, 1);
}
}else{
    $courses=[];
}

$response["success"]= true;
$response["message"]='success';
$response['course']=$courses;
$data['count']     = $course_count1;
$status = 200;
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
public function getLearnerQuestionAnswer(Request $request){
    $status=400;
    // $_REQUEST=json_decode($request->getContent(),true);
    $rules = array(
        'c_id'            => 'required',
        'user_id'         => 'required'
    );      
    $validator = Validator::make($request->all(), $rules);
    if ($validator->passes()) { 
        // $request = $this->saveFiles($request);

        $courseDetail= Course::select('*')->where('id',$request->c_id)->first();
        if($courseDetail){
            $question_front=Question::where('course_id',$request->c_id)->get();
            if(count($question_front)>0){
                foreach ($question_front as $key => $value) {
                    if($value->user_id==$request->user_id){
                        $value->current_user=true;
                    }else{
                        $value->current_user=false;
                    }
                    $value->user_id=(int)$value->user_id;
                    $value->category_id=(int)$value->category_id;
                    $value->course_id=(int)$value->course_id;

                    
                    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$value->user_id)->first();
                    $sCount=Order::select('id')->where('instructor_id',$value->user_id)->where('course_id',$request->c_id)->count();
                    $cCount=Course::select('id')->where('user_id',$value->user_id)->count();
                    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$value->user_id)->orderBy('id','DESC')->first();

                    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                            if($rCount>0){
                                $reviews_count=number_format(($rCountValue/$rCount),1);
                            }else{
                                $reviews_count="0.0";
                            }
                    $value->author=array(
                        'name'=>trim($userDetail['fname']." ".$userDetail['lname']),
                        'about_bio'=>$userDetail->detail,
                        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                        'no_of_students'=>$sCount,
                        'reviews_count'=>$reviews_count,
                        'no_of_courses_count'=>$cCount
                    );

                    $answer_front=Answer::where('course_id',$value->course_id)->where('question_id',$value->id)->get();               
                    if(count($answer_front)>0){
                        foreach($answer_front as $keyA => $valueA) {
                            if($valueA->ans_user_id==$request->user_id){
                                $valueA->current_user=true;
                            }else{
                                $valueA->current_user=false;
                            }
                            $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueA->ans_user_id)->first();
                            $sCount=Order::select('id')->where('instructor_id',$value->user_id)->where('course_id',$value->course_id)->count();
                            $cCount=Course::select('id')->where('user_id',$value->user_id)->count();
                            $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$value->user_id)->orderBy('id','DESC')->first();

                            $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                            $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                            if($rCount>0){
                                $reviews_count=number_format(($rCountValue/$rCount),1);
                            }else{
                                $reviews_count="0.0";
                            }
                            $value->author=array(
                                'name'=>trim($userDetail->fname." ".$userDetail->lname),
                                'about_bio'=>$userDetail->detail,
                                'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                                'no_of_students'=>$sCount,
                                'reviews_count'=>$reviews_count,
                                'no_of_courses_count'=>$cCount
                            );

                        }
                    }
                    $value->answer=$answer_front;
                }
            }

            $status=200;
            $response['success']=true;
            $response["message"]    = "Question Answer";
            $response['question_answers']=$question_front;
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
public function postLearnerQuestionAdd(Request $request){
    $status=400;
    $_REQUEST=json_decode($request->getContent(),true);
    $rules = array(
        'course_id'       => 'required',
        'instructor_id'   => 'required',
        'question'        => 'required',
        'user_id'         => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        // $request = $this->saveFiles($request);

        $courseDetail= Course::select('*')->where('id',$_REQUEST['course_id'])->first();
        if($courseDetail){

            if(isset($_REQUEST['id']) && $_REQUEST['id']==''){
                $data=array(
                    'course_id'     =>$_REQUEST['course_id'],
                    'question'      =>$_REQUEST['question'],
                    'instructor_id' =>$_REQUEST['instructor_id'],
                    'user_id'       =>$_REQUEST['user_id'],
                    'status'        =>1,
                    'created_at'    =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'    =>\Carbon\Carbon::now()->toDateTimeString()
                );
                $idAdded=Question::create($data);
                $id=$idAdded['id'];
            }else{
                $data=array(
                    'question'      =>$_REQUEST['question'],
                    'updated_at'    =>\Carbon\Carbon::now()->toDateTimeString()
                );

                $dataRes = Question::findorfail($_REQUEST['id']);
                $dataRes->update($data);
                $id=$_REQUEST['id'];
            }
            $question_front=Question::where('course_id',$_REQUEST['course_id'])->where('id',$id)->first();
            if($question_front){
                if($question_front->user_id==$_REQUEST['user_id']){
                    $question_front->current_user=true;
                }else{
                    $question_front->current_user=false;
                }
                 $question_front->user_id=(int)$question_front->user_id;
                     $question_front->course_id=(int)$question_front->course_id;
                    $userDetail= User::select('*')->where('id',$question_front->user_id)->first();
                    if($userDetail){
                      $question_front->author=array(
                        'name'=>trim($userDetail->fname." ".$userDetail->lname),
                        'about_bio'=>$userDetail->detail,
                        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg')
                    );
                }

                $answer_front=Answer::where('course_id',$question_front->course_id)->where('question_id',$question_front->id)->get();     
                foreach ($answer_front as $keyA => $valueA) {
                    $userDetail= User::select('*')->where('id',$valueA->ans_user_id)->first();
                    if($valueA->ans_user_id==$_REQUEST['user_id']){
                        $valueA->current_user=true;
                    }else{
                        $valueA->current_user=false;
                    }
                    if($userDetail){
                      $valueA->author=array(
                        'name'=>trim($userDetail->fname." ".$userDetail->lname),
                        'about_bio'=>$userDetail->detail,
                        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg')
                    );  
                  }
              }

                         
          $question_front->answer=$answer_front;
      }

      $status=200;
      $response['success']=true;
      if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
        $response["message"]    = "Question updated successfully";
    }else{
        $response["message"]    = "Question added successfully";
    }
    $response['question_answer']=$question_front;
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
public function postLearnerAnswerAdd(Request $request){
    $status=400;
    $_REQUEST=json_decode($request->getContent(),true);
    $rules = array(
        'course_id'       => 'required',
        // 'topic_id'        => 'required',
        'question_id'        => 'required',
        'answer'     => 'required',
        'ans_user_id'        => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $courseDetail= Course::select('*')->where('id',$_REQUEST['course_id'])->first();

        $QuestionDet= Question::select('*')->where('id',$_REQUEST['question_id'])->first();
        if($courseDetail){
            if(isset($_REQUEST['id']) && $_REQUEST['id']==''){
                $data=array(
                    'instructor_id' =>$courseDetail->user_id,
                    'ans_user_id'   =>$_REQUEST['ans_user_id'],
                    'ques_user_id'  =>$QuestionDet->user_id,
                    'course_id'     =>$_REQUEST['course_id'],
                    'question_id'   =>$_REQUEST['question_id'],
                    'answer'        =>$_REQUEST['answer'],
                    'status'        =>1,
                    'created_at'    =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'    =>\Carbon\Carbon::now()->toDateTimeString()
                );
               // print_r($data);
                Answer::create($data);
            }else{
                $data=array(
                    'answer'      =>$_REQUEST['answer'],
                    'updated_at'  =>\Carbon\Carbon::now()->toDateTimeString()
                );

                // Answer::where('id',$_REQUEST['id'])->update($data);
                $dataRes = Answer::findorfail($_REQUEST['id']);
                $dataRes->update($data);

            }

            $id=$_REQUEST['question_id'];
           $question_front=Question::where('course_id',$_REQUEST['course_id'])->where('id',$id)->first();
            if($question_front){
                    $question_front->user_id=(int)$question_front->user_id;
                     $question_front->course_id=(int)$question_front->course_id;
                    if($question_front->user_id==$_REQUEST['ans_user_id']){
                        $question_front->current_user=true;
                    }else{
                        $question_front->current_user=false;
                    }
                    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$question_front->user_id)->first();
                    $sCount=Order::select('id')->where('instructor_id',$question_front->user_id)->where('course_id',$question_front->course_id)->count();
                    $cCount=Course::select('id')->where('user_id',$question_front->user_id)->count();
                    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$question_front->user_id)->orderBy('id','DESC')->first();

                    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                    if($rCount>0){
                        $reviews_count=number_format(($rCountValue/$rCount),1);
                    }else{
                        $reviews_count="0.0";
                    }
                    $question_front->author=array(
                        'name'=>trim($userDetail['fname']." ".$userDetail['lname']),
                        'about_bio'=>$userDetail->detail,
                        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                        'no_of_students'=>$sCount,
                        'reviews_count'=>$reviews_count,
                        'no_of_courses_count'=>$cCount,
                        'course'=>$this->authorcourse($question_front->user_id,$_REQUEST['ans_user_id'])
                    );

                    $answer_front=Answer::where('course_id',$question_front->course_id)->where('question_id',$question_front->id)->get();               
                    if(count($answer_front)>0){
                        foreach($answer_front as $keyA => $valueA) {
                            if($valueA->ans_user_id==$_REQUEST['ans_user_id']){
                                $valueA->current_user=true;
                            }else{
                                $valueA->current_user=false;
                            }
                            $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueA->ans_user_id)->first();
                            $sCount=Order::select('id')->where('instructor_id',$question_front->user_id)->where('course_id',$question_front->course_id)->count();
                            $cCount=Course::select('id')->where('user_id',$question_front->user_id)->count();
                            $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$question_front->user_id)->orderBy('id','DESC')->first();

                        $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                        $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                        if($rCount>0){
                            $reviews_count=number_format(($rCountValue/$rCount),1);
                        }else{
                            $reviews_count="0.0";
                        }
                            $valueA->author=array(
                                'name'=>trim($userDetail->fname." ".$userDetail->lname),
                                'about_bio'=>$userDetail->detail,
                                'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                                'no_of_students'=>$sCount,
                                'reviews_count'=>$reviews_count,
                                'no_of_courses_count'=>$cCount,                                
                                'course'=>$this->authorcourse($valueA->ans_user_id,$_REQUEST['ans_user_id'])
                            );

                        }
                    }
                    $question_front->answer=$answer_front;
            }

        $status=200;
        $response['success']=true;
        if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
            $response["message"]    = "Answer updated successfully";
        }else{
            $response["message"]    = "Answer added successfully";
        }
        $response['question_answer']=$question_front;
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
public function postLearnerQuestionRemove(Request $request){
    $status=400;
    $_REQUEST=json_decode($request->getContent(),true);
    $rules = array(
        'course_id'       => 'required',
        'question_id'     => 'required',
        // 'topic_id'     => 'required',
        'user_id'        => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $courseDetail= Course::select('*')->where('id',$_REQUEST['course_id'])->first();
        if($courseDetail){
            $questionCheck=Question::where('id',$_REQUEST['question_id'])->where('course_id',$_REQUEST['course_id'])->where('user_id',$_REQUEST['user_id'])->first();
            if($questionCheck){ 
                Question::where('id',$_REQUEST['question_id'])->where('course_id',$_REQUEST['course_id'])->where('user_id',$_REQUEST['user_id'])->delete();

                Answer::where('question_id',$_REQUEST['question_id'])->delete();
            }


            $question_front=Question::where('course_id',$_REQUEST['course_id'])->get();
            if(count($question_front)>0){
                foreach ($question_front as $key => $value) {
                     $value->user_id=(int)$value->user_id;                     
                     $value->course_id=(int)$value->course_id;
                    if($value->user_id==$_REQUEST['user_id']){
                        $value->current_user=true;
                    }else{
                        $value->current_user=false;
                    }
                    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$value->user_id)->first();
                    $sCount=Order::select('id')->where('instructor_id',$value->user_id)->where('course_id',$_REQUEST['course_id'])->count();
                    $cCount=Course::select('id')->where('user_id',$value->user_id)->count();
                    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$value->user_id)->orderBy('id','DESC')->first();

                    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                    if($rCount>0){
                        $reviews_count=number_format(($rCountValue/$rCount),1);
                    }else{
                        $reviews_count="0.0";
                    }
                    $value->author=array(
                        'name'=>trim($userDetail['fname']." ".$userDetail['lname']),
                        'about_bio'=>$userDetail->detail,
                        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                        'no_of_students'=>$sCount,
                        'reviews_count'=>$reviews_count,
                        'no_of_courses_count'=>$cCount
                    );

                    $answer_front=Answer::where('course_id',$value->course_id)->where('question_id',$value->id)->get();               
                    if(count($answer_front)>0){
                        foreach($answer_front as $keyA => $valueA) {
                            if($valueA->ans_user_id==$_REQUEST['user_id']){
                                $valueA->current_user=true;
                            }else{
                                $valueA->current_user=false;
                            }
                            $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueA->ans_user_id)->first();
                            $sCount=Order::select('id')->where('instructor_id',$value->user_id)->where('course_id',$value->course_id)->count();
                            $cCount=Course::select('id')->where('user_id',$value->user_id)->count();
                            $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$value->user_id)->orderBy('id','DESC')->first();

                           $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                           $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                            if($rCount>0){
                                $reviews_count=number_format(($rCountValue/$rCount),1);
                            }else{
                                $reviews_count="0.0";
                            }
                            $value->author=array(
                                'name'=>trim($userDetail->fname." ".$userDetail->lname),
                                'about_bio'=>$userDetail->detail,
                                'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                                'no_of_students'=>$sCount,
                                'reviews_count'=>$reviews_count,
                                'no_of_courses_count'=>$cCount
                            );

                        }
                    }
                    $value->answer=$answer_front;
                }
            }


          $status=200;
          $response['success']=true;
          $response["message"]    = "Question deleted successfully";
          $response['question_answers']=$question_front;
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
public function postLearnerAnswerRemove(Request $request){
    $status=400;
    $_REQUEST=json_decode($request->getContent(),true);
    $rules = array(
        'course_id'       => 'required',
        // 'question_id'     => 'required',
        'answer_id'     => 'required',
        'ans_user_id'        => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 
        $question_front=array();
        $courseDetail= Course::select('*')->where('id',$_REQUEST['course_id'])->first();
        if($courseDetail){
            $questionCheck=Answer::where('id',$_REQUEST['answer_id'])->where('course_id',$_REQUEST['course_id'])->where('ans_user_id',$_REQUEST['ans_user_id'])->first();
            if($questionCheck){ 
             Answer::where('id',$_REQUEST['answer_id'])->delete();
         

          $question_front=Question::where('course_id',$_REQUEST['course_id'])->where('id',$questionCheck->question_id)->first();
            if($question_front){
                     $question_front->user_id=(int)$question_front->user_id;
                     $question_front->course_id=(int)$question_front->course_id;
                    if($question_front->user_id==$_REQUEST['ans_user_id']){
                        $question_front->current_user=true;
                    }else{
                        $question_front->current_user=false;
                    }
                    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$question_front->user_id)->first();
                    $sCount=Order::select('id')->where('instructor_id',$question_front->user_id)->where('course_id',$question_front->course_id)->count();
                    $cCount=Course::select('id')->where('user_id',$question_front->user_id)->count();
                    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$question_front->user_id)->orderBy('id','DESC')->first();

                    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                    if($rCount>0){
                        $reviews_count=number_format(($rCountValue/$rCount),1);
                    }else{
                        $reviews_count="0.0";
                    }
                    $question_front->author=array(
                        'name'=>trim($userDetail['fname']." ".$userDetail['lname']),
                        'about_bio'=>$userDetail->detail,
                        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                        'no_of_students'=>$sCount,
                        'reviews_count'=>$reviews_count,
                        'no_of_courses_count'=>$cCount
                    );

                    $answer_front=Answer::where('course_id',$question_front->course_id)->where('question_id',$question_front->id)->get();               
                    if(count($answer_front)>0){
                        foreach($answer_front as $keyA => $valueA) {
                            if($valueA->ans_user_id==$_REQUEST['ans_user_id']){
                                $valueA->current_user=true;
                            }else{
                                $valueA->current_user=false;
                            }
                            $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueA->ans_user_id)->first();
                            $sCount=Order::select('id')->where('instructor_id',$question_front->user_id)->where('course_id',$question_front->course_id)->count();
                            $cCount=Course::select('id')->where('user_id',$question_front->user_id)->count();
                            $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$question_front->user_id)->orderBy('id','DESC')->first();

                        $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
                        $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
                        if($rCount>0){
                            $reviews_count=number_format(($rCountValue/$rCount),1);
                        }else{
                            $reviews_count="0.0";
                        }
                            $valueA->author=array(
                                'name'=>trim($userDetail->fname." ".$userDetail->lname),
                                'about_bio'=>$userDetail->detail,
                                'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
                                'no_of_students'=>$sCount,
                                'reviews_count'=>$reviews_count,
                                'no_of_courses_count'=>$cCount
                            );

                        }
                    }
                    $question_front->answer=$answer_front;
            }
        }
      $status=200;
      $response['success']=true;
      $response["message"]    = "Answer deleted successfully";
      $response['question_answer']=$question_front;
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

public function postAddCart(Request $request){
    $_REQUEST=json_decode($request->getContent(),true);
    $status=400;
    $rules = array(
        'course_id'         => 'required',
        'user_id'           => 'required',
        'category_id'       => 'required',
        'price'             => 'required',
        'discount_price'    => 'required'
    );      
    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) { 


        $cart = Cart::where('user_id', $_REQUEST['user_id'])->where('course_id', $_REQUEST['course_id'])->first();

        if(!empty($cart)){
            $response["message"]    = "Item is already in your cart";
        }else {
            \DB::table('carts')->insert(
                array(
                    'user_id'       => $_REQUEST['user_id'],
                    'course_id'     => $_REQUEST['course_id'],
                    'category_id'   => $_REQUEST['category_id'],
                    'price'         => $_REQUEST['price'],
                    'offer_price'   => $_REQUEST['discount_price'],
                    'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),

                )
            );
            $response["message"]    = "Course is added to your cart !";
        }
        // $cartDetail = Cart::where('user_id', $_REQUEST['user_id'])->get();
        
        $courses= Course::select('courses.*')->join('carts','courses.id','=','carts.course_id')->where('carts.user_id',$request->user_id)->orderBy('carts.id','DESC')->get();
        $course_count=Order::select(\DB::raw('group_concat(course_id) as ids'))->where('user_id',$_REQUEST['user_id'])->orderBy('orders.id','DESC')->first();
        if(count($courses)>0){
          $duration=0;
          foreach ($courses as $keyS => $valueS) {
            $valueS->course_url=\URL::to("/")."/course/".$valueS->id."/".str_replace(" ","-",$valueS->title);
           $valueS->order_id=0;
           $valueS->type=($valueS->type==1) ? 'paid' : 'free';
           if($course_count->ids!=''){
            if(in_array($valueS->id,explode(",", $course_count->ids))){
             $valueS->enrolled=true;
         }else{
             $valueS->enrolled=false;
         }
     }else{
         $valueS->enrolled=false;
     }
     $valueS->currency=$this->current();
     $cart_cId= Cart::select('course_id','id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
        $valueS->cart=($cart_cId) ? true : false;
        $valueS->cart_id=($cart_cId) ? (int)$cart_cId->id : 0;
     $wishlists= \DB::table('wishlists')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
     $valueS->wishlist=($wishlists) ? true : false;
     // if(file_exists(base_path('images/course/'.$valueS->preview_image))){
     if($valueS->preview_image!=''){
        $valueS->image=\URL::to('images/course/'.$valueS->preview_image);
    }else{
        $valueS->image=\URL::to('uploads/no-img.jpg');
    }
    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueS->user_id)->first();
    $sCount=Order::select('id')->where('instructor_id',$valueS->user_id)->where('course_id',$valueS->id)->count();
    $cCount=Course::select('id')->where('user_id',$valueS->user_id)->count();
    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$valueS->user_id)->orderBy('id','DESC')->first();

    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
    if($rCount>0){
        $reviews_count=number_format(($rCountValue/$rCount),1);
    }else{
        $reviews_count="0.0";
    }
    $valueS->author=array(
        'name'=>trim($userDetail->fname." ".$userDetail->lname),
        'about_bio'=>$userDetail->detail,
        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
        'no_of_students'=>$sCount,
        'reviews_count'=>$reviews_count,
        'no_of_courses_count'=>$cCount,
        'course'=>$this->authorcourse($valueS->user_id,$request->user_id)
    );
    $valueS->benefits = WhatLearn::where('course_id','=',$valueS->id)->get();

    $valueS->courseinclude = CourseInclude::where('course_id','=',$valueS->id)->get();
    $coursechapters = CourseChapter::where('course_id','=',$valueS->id)->get();
    $duration=0;
    foreach ($coursechapters as $cKey => $cValue) {
        $courseclass = CourseClass::where('course_id',$valueS->id)->where('coursechapter_id',$cValue->id)->get();
        foreach ($courseclass as $ccKey => $ccValue) {
            if($ccValue->url != ''){
                $ccValue->video = str_replace("https://youtu.be/", "https://youtube.com/watch?v=", $ccValue->url);
            }else{
                $ccValue->video = url('video/class/'.$ccValue->video);
            }

            if($ccValue->type =='video'){
                if($ccValue->duration>0){
                    $duration=$duration+$ccValue->duration;
                }

            }
        }
        $cValue->courseclass=$courseclass;
    }
    $valueS->coursechapters=$coursechapters;
    $valueS->course_includes=array('total_hours'=>date('H:i', mktime(0,$duration)),'articles'=>rand(pow(10, 0), pow(10, 1)-1));

    $learn = 0;
    $price = 0;
    $value = 0;
    $sub_total = 0;
    $overallrating=0;
    $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
    $count =  count($reviews);
    if($count>0){
       foreach($reviews as $review){
         $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
         $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
         $learn = $review->learn*5;
         $price = $review->price*5;
         $value = $review->value*5;
         $sub_total = $sub_total + $learn + $price + $value;
     } 
 }


 $count = ($count*3) * 5;

 if($count != "")
 {
    $rat = $sub_total/$count;

    $ratings_var = ($rat*100)/5;

    $overallrating = ($ratings_var/2)/10;
}
$valueS->reviews=$reviews;
$valueS->avg_rating=round($overallrating, 1);


}

}else{
    $courses=[];
}
        $status=200;
        $response['success']=true;
        $response['cart_details']=$courses;
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
public function postRemoveCart(Request $request){

    $_REQUEST=json_decode($request->getContent(),true);
    $status=400;
    $rules = array(
        'cart_id'    => 'required',
        'user_id'    => 'required'
    );      

    $validator = Validator::make($_REQUEST, $rules);
    if ($validator->passes()) {

        $cart = Cart::find($_REQUEST['cart_id']);
        if($cart){
            Cart::where('id',$_REQUEST['cart_id'])->delete();
        }
        // $cart->delete();
        // $cartDetail = Cart::where('user_id', $_REQUEST['user_id'])->get();
        
        $courses= Course::select('courses.*')->join('carts','courses.id','=','carts.course_id')->where('carts.user_id',$_REQUEST['user_id'])->orderBy('carts.id','DESC')->get();
        $course_count=Order::select(\DB::raw('group_concat(course_id) as ids'))->where('user_id',$_REQUEST['user_id'])->orderBy('orders.id','DESC')->first();
        if(count($courses)>0){
          $duration=0;
          foreach ($courses as $keyS => $valueS) {
            $valueS->course_url=\URL::to("/")."/course/".$valueS->id."/".str_replace(" ","-",$valueS->title);
           $valueS->order_id=0;
           $valueS->type=($valueS->type==1) ? 'paid' : 'free';
           if($course_count->ids!=''){
            if(in_array($valueS->id,explode(",", $course_count->ids))){
             $valueS->enrolled=true;
         }else{
             $valueS->enrolled=false;
         }
     }else{
         $valueS->enrolled=false;
     }
     $valueS->currency=$this->current();
     $cart_cId= Cart::select('course_id','id')->where('user_id',$_REQUEST['user_id'])->where('course_id',$valueS->id)->first();
        $valueS->cart=($cart_cId) ? true : false;
        $valueS->cart_id=($cart_cId) ? (int)$cart_cId->id : 0;
     $wishlists= \DB::table('wishlists')->where('user_id',$_REQUEST['user_id'])->where('course_id',$valueS->id)->first();
     $valueS->wishlist=($wishlists) ? true : false;
     // if(file_exists(base_path('images/course/'.$valueS->preview_image))){
     if($valueS->preview_image!=''){
        $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
    }else{
        $valueS->preview_image=\URL::to('uploads/no-img.jpg');
    }
    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueS->user_id)->first();
    $sCount=Order::select('id')->where('instructor_id',$valueS->user_id)->where('course_id',$valueS->id)->count();
    $cCount=Course::select('id')->where('user_id',$valueS->user_id)->count();
    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$valueS->user_id)->orderBy('id','DESC')->first();

    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
    if($rCount>0){
        $reviews_count=number_format(($rCountValue/$rCount),1);
    }else{
        $reviews_count="0.0";
    }
    $valueS->author=array(
        'name'=>trim($userDetail->fname." ".$userDetail->lname),
        'about_bio'=>$userDetail->detail,
        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
        'no_of_students'=>$sCount,
        'reviews_count'=>$reviews_count,
        'no_of_courses_count'=>$cCount,
        'course'=>$this->authorcourse($valueS->user_id,$_REQUEST['user_id'])
    );
    $valueS->benefits = WhatLearn::where('course_id','=',$valueS->id)->get();

    $valueS->courseinclude = CourseInclude::where('course_id','=',$valueS->id)->get();
    $coursechapters = CourseChapter::where('course_id','=',$valueS->id)->get();
    $duration=0;
    foreach ($coursechapters as $cKey => $cValue) {
        $courseclass = CourseClass::where('course_id',$valueS->id)->where('coursechapter_id',$cValue->id)->get();
        foreach ($courseclass as $ccKey => $ccValue) {
            if($ccValue->url != ''){
                $ccValue->video = str_replace("https://youtu.be/", "https://youtube.com/watch?v=", $ccValue->url);
            }else{
                $ccValue->video = url('video/class/'.$ccValue->video);
            }

            if($ccValue->type =='video'){
                if($ccValue->duration>0){
                    $duration=$duration+$ccValue->duration;
                }

            }
        }
        $cValue->courseclass=$courseclass;
    }
    $valueS->coursechapters=$coursechapters;
    $valueS->course_includes=array('total_hours'=>date('H:i', mktime(0,$duration)),'articles'=>rand(pow(10, 0), pow(10, 1)-1));

    $learn = 0;
    $price = 0;
    $value = 0;
    $sub_total = 0;
    $overallrating=0;
    $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
    $count =  count($reviews);
    if($count>0){
       foreach($reviews as $review){
         $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
         $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
         $learn = $review->learn*5;
         $price = $review->price*5;
         $value = $review->value*5;
         $sub_total = $sub_total + $learn + $price + $value;
     } 
 }


 $count = ($count*3) * 5;

 if($count != "")
 {
    $rat = $sub_total/$count;

    $ratings_var = ($rat*100)/5;

    $overallrating = ($ratings_var/2)/10;
}
$valueS->reviews=$reviews;
$valueS->avg_rating=round($overallrating, 1);


}

}else{
    $courses=[];
}
        $status=200;
        $response['success']=true;
        $response["message"]    = "Course is removed from your cart";
        $response['cart_details']=$courses;
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

public function postViewCart(Request $request){
    $status=400;
    $rules = array(
        'user_id'    => 'required',
    );   
    $validator = Validator::make($request->all(), $rules);
    if ($validator->passes()) {  
        // $cartDetail = Cart::where('user_id', $request->user_id)->get();

        $courses= Course::select('courses.*')->join('carts','courses.id','=','carts.course_id')->where('carts.user_id',$request->user_id)->orderBy('carts.id','DESC')->get();
        $course_count=Order::select(\DB::raw('group_concat(course_id) as ids'))->where('user_id',$request->user_id)->orderBy('orders.id','DESC')->first();
        if(count($courses)>0){
          $duration=0;
          foreach ($courses as $keyS => $valueS) {
            $valueS->course_url=\URL::to("/")."/course/".$valueS->id."/".str_replace(" ","-",$valueS->title);
           $valueS->order_id=0;
           $valueS->type=($valueS->type==1) ? 'paid' : 'free';
           if($course_count->ids!=''){
            if(in_array($valueS->id,explode(",", $course_count->ids))){
             $valueS->enrolled=true;
         }else{
             $valueS->enrolled=false;
         }
     }else{
         $valueS->enrolled=false;
     }
     $valueS->currency=$this->current();
     $cart_cId= Cart::select('course_id','id')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
        $valueS->cart=($cart_cId) ? true : false;
        $valueS->cart_id=($cart_cId) ? (int)$cart_cId->id : 0;
     $wishlists= \DB::table('wishlists')->where('user_id',$request->user_id)->where('course_id',$valueS->id)->first();
     $valueS->wishlist=($wishlists) ? true : false;
     // if(file_exists(base_path('images/course/'.$valueS->preview_image))){
     if($valueS->preview_image!=''){
        $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
    }else{
        $valueS->preview_image=\URL::to('uploads/no-img.jpg');
    }
    $userDetail= User::select('id','fname','lname','email','user_img','mobile','role','detail')->where('id',$valueS->user_id)->first();
    $sCount=Order::select('id')->where('instructor_id',$valueS->user_id)->where('course_id',$valueS->id)->count();
    $cCount=Course::select('id')->where('user_id',$valueS->user_id)->count();
    $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$valueS->user_id)->orderBy('id','DESC')->first();

    $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
    $rCountValue = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->sum('value');
    if($rCount>0){
        $reviews_count=number_format(($rCountValue/$rCount),1);
    }else{
        $reviews_count="0.0";
    }
    $valueS->author=array(
        'name'=>trim($userDetail->fname." ".$userDetail->lname),
        'about_bio'=>$userDetail->detail,
        'avatar'=>($userDetail['user_img']!='') ? URL::to('/')."/images/user_img/".$userDetail['user_img'] : \URL::to('/images/default/user.jpg'),
        'no_of_students'=>$sCount,
        'reviews_count'=>$reviews_count,
        'no_of_courses_count'=>$cCount,
        'course'=>$this->authorcourse($valueS->user_id,$request->user_id)
    );
    $valueS->benefits = WhatLearn::where('course_id','=',$valueS->id)->get();

    $valueS->courseinclude = CourseInclude::where('course_id','=',$valueS->id)->get();
    $coursechapters = CourseChapter::where('course_id','=',$valueS->id)->get();
    $duration=0;
    foreach ($coursechapters as $cKey => $cValue) {
        $courseclass = CourseClass::where('course_id',$valueS->id)->where('coursechapter_id',$cValue->id)->get();
        foreach ($courseclass as $ccKey => $ccValue) {
            if($ccValue->url != ''){
                $ccValue->video = str_replace("https://youtu.be/", "https://youtube.com/watch?v=", $ccValue->url);
            }else{
                $ccValue->video = url('video/class/'.$ccValue->video);
            }

            if($ccValue->type =='video'){
                if($ccValue->duration>0){
                    $duration=$duration+$ccValue->duration;
                }

            }
        }
        $cValue->courseclass=$courseclass;
    }
    $valueS->coursechapters=$coursechapters;
    $valueS->course_includes=array('total_hours'=>date('H:i', mktime(0,$duration)),'articles'=>rand(pow(10, 0), pow(10, 1)-1));

    $learn = 0;
    $price = 0;
    $value = 0;
    $sub_total = 0;
    $overallrating=0;
    $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
    $count =  count($reviews);
    if($count>0){
       foreach($reviews as $review){
         $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
         $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
         $learn = $review->learn*5;
         $price = $review->price*5;
         $value = $review->value*5;
         $sub_total = $sub_total + $learn + $price + $value;
     } 
 }


 $count = ($count*3) * 5;

 if($count != "")
 {
    $rat = $sub_total/$count;

    $ratings_var = ($rat*100)/5;

    $overallrating = ($ratings_var/2)/10;
}
$valueS->reviews=$reviews;
$valueS->avg_rating=round($overallrating, 1);


}

}else{
    $courses=[];
}
$status=200;
$response['success']=true;
$response["message"]    = "Cart is viewed successfully";
$response['cart_details']=$courses;
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

public function postBuyNow(Request $request){
 $_REQUEST=json_decode($request->getContent(),true);
 $status=400;
 $rules = array(
    'user_id'    => 'required',
    'transaction_id'    => 'required',
);      
 $validator = Validator::make($_REQUEST, $rules);
 if ($validator->passes()) {
    $currency = $this->current();
    $carts = Cart::where('user_id',$_REQUEST['user_id'])->get();
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
            $duration = NULL;
        }
        $instructor_payout = NULL;
        $setting = InstructorSetting::first();

        if(isset($setting))
        {
            if($cart->courses->user->role == "instructor")
            {
                $x_amount = $pay_amount * $setting->instructor_revenue;
                $instructor_payout = $x_amount / 100;
            }
            else
            {
                $instructor_payout = NULL;
            }
        }


        $lastOrder = Order::orderBy('created_at', 'desc')->first();

        if ( ! $lastOrder )
        {
                    // We get here if there is no order at all
                    // If there is no number set it to 0, which will be 1 at the end.
            $number = 0;
        }
        else
        { 
            $number = substr($lastOrder->order_id, 3);
        }

        $created_order = Order::create([
            'course_id' => $cart->course_id,
            'user_id' => $_REQUEST['user_id'],
            'instructor_id' => $cart->courses->user_id,
            'order_id' => '#' . sprintf("%08d", intval($number) + 1),
            'transaction_id' => $_REQUEST['transaction_id'],
            'payment_method' => 'BankTransfer',
            'total_amount' => $pay_amount,
            'coupon_discount' => $cpn_discount,
            'currency' => $currency->currency,
            'currency_icon' => $currency->icon,
            'duration' => $cart->courses->duration,
            'enroll_start' => $todayDate,
            'enroll_expire' => $expireDate,
            'status' => 0,
            'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
        ]
    );

        // Wishlist::where('user_id',$_REQUEST['user_id'])->where('course_id', $cart->course_id)->delete();

        Cart::where('user_id',$_REQUEST['user_id'])->where('course_id', $cart->course_id)->delete();

        if($created_order){

            if($cart->courses->user->role == "instructor")
            {

                $created_payout = PendingPayout::create([
                    'user_id' => $cart->courses->user_id,
                    'course_id' => $cart->course_id,
                    'order_id' => $created_order->id,
                    'transaction_id' => $created_order->transaction_id,
                    'total_amount' => $pay_amount,
                    'currency' => $currency->currency,
                    'currency_icon' => $currency->icon,
                    'instructor_revenue' => $instructor_payout,
                    'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                ]
            );
            }

        }

        if($created_order){
            if (env('MAIL_USERNAME')!=null) {
                try{

                    /*sending email*/
                    $x = 'You are successfully enrolled in a course';
                    $order = $created_order;
                    // Mail::to(Auth::User()->email)->send(new SendOrderMail($x, $order));


                }catch(\Swift_TransportException $e){
                    // header( "refresh:5;url=./" );
                    // dd("Payment Successfully ! but Invoice will not sent because admin not updated the mail setting in admin dashboard ! Redirecting you to homepage... !");
                }
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
$status=200;
$response['success']=true;
$response["message"]    = "Payment success";
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
function current(){
    // 'icon',
    $currency=Currency::select('currency')->first();
    $currency['symbol']='$';
     return $currency;
}

function authorcourse($id,$user_id){

    $course_count=Order::select(\DB::raw('group_concat(course_id) as ids'))->where('user_id',$user_id)->orderBy('orders.id','DESC')->first();
    $courses= Course::where('user_id',$id)->where('status','1')->get();
    $duration=0;
    foreach ($courses as $keyS => $valueS) {
        $valueS->course_url=\URL::to("/")."/course/".$valueS->id."/".str_replace(" ","-",$valueS->title);
        $valueS->order_id=0;
        $valueS->type=($valueS->type==1) ? 'paid' : 'free';
        if($course_count->ids!=''){
            if(in_array($valueS->id,explode(",", $course_count->ids))){
                $valueS->enrolled=true;
            }else{
                $valueS->enrolled=false;
            }
        }else{
            $valueS->enrolled=false;
        }
         $valueS->currency=$this->current();
        if($valueS->preview_type=='video'){
            if($valueS->video!=''){
                $valueS->sample_video=\URL::to('video/preview/'.$valueS->video);
            }else{
                $valueS->sample_video='';
            }
        }else{
            $valueS->sample_video=$valueS->url;
        }
        $cart_cId= Cart::select('course_id','id')->where('user_id',$user_id)->where('course_id',$valueS->id)->first();
        $valueS->cart=($cart_cId) ? true : false;
        $valueS->cart_id=($cart_cId) ? (int)$cart_cId->id : 0;
        $wishlists= \DB::table('wishlists')->where('user_id',$user_id)->where('course_id',$valueS->id)->first();
        $valueS->wishlist=($wishlists) ? true : false;
// if(file_exists(base_path(asset('images/course/'.$valueS->preview_image)))){
        if($valueS->preview_image!=''){
            $valueS->preview_image=\URL::to('images/course/'.$valueS->preview_image);
        }else{
            $valueS->preview_image=\URL::to('uploads/no-img.jpg');
        }
        $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$valueS->user_id)->first();
        $sCount=Order::select('id')->where('instructor_id',$valueS->user_id)->where('course_id',$valueS->id)->count();
        $cCount=Course::select('id')->where('user_id',$valueS->user_id)->count();
        $coursesId=Course::select(\DB::raw('group_concat(id) as ids'))->where('user_id',$valueS->user_id)->orderBy('id','DESC')->first();

        $rCount = ReviewRating::whereIn('course_id',explode(",",$coursesId->ids))->count();
        
        $valueS->benefits = WhatLearn::where('course_id','=',$valueS->id)->get();

        $valueS->courseinclude = CourseInclude::where('course_id','=',$valueS->id)->get();
        $coursechapters = CourseChapter::where('course_id','=',$valueS->id)->get();
        $duration=0;
        foreach ($coursechapters as $cKey => $cValue) {
            $courseclass = CourseClass::where('course_id',$valueS->id)->where('coursechapter_id',$cValue->id)->get();
            foreach ($courseclass as $ccKey => $ccValue) {
                if($ccValue->url != ''){
                    $ccValue->video = str_replace("https://youtu.be/", "https://youtube.com/watch?v=", $ccValue->url);
                }else{
                    $ccValue->video = url('video/class/'.$ccValue->video);
                }

                if($ccValue->type =='video'){
                    if($ccValue->duration>0){
                        $duration=$duration+$ccValue->duration;
                    }

                }
            }
            $cValue->courseclass=$courseclass;
        }
        $valueS->coursechapters=$coursechapters;
        $valueS->course_includes=array('total_hours'=>date('H:i', mktime(0,$duration)),'articles'=>rand(pow(10, 0), pow(10, 1)-1));

        $learn = 0;
        $price = 0;
        $value = 0;
        $sub_total = 0;
        $overallrating=0;
        $reviews = ReviewRating::where('course_id','=',$valueS->id)->get();
        $count =  count($reviews);
        if($count>0){
            foreach($reviews as $review){

                $userDetail= User::select('id','fname','lname','email','user_img','mobile','role')->where('id',$review->user_id)->first();
                $review->reviewer_name=trim($userDetail->fname." ".$userDetail->lname);
                $learn = $review->learn*5;
                $price = $review->price*5;
                $value = $review->value*5;
                $sub_total = $sub_total + $learn + $price + $value;
            } 
        }


        $count = ($count*3) * 5;

        if($count != "")
        {
            $rat = $sub_total/$count;

            $ratings_var = ($rat*100)/5;

            $overallrating = ($ratings_var/2)/10;
        }
        $valueS->reviews=$reviews;
        $valueS->avg_rating=round($overallrating, 1);


    }
    return $courses;

}
}