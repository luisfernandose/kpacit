<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/signin', 'service\UsersController@postSignin');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
	Route::get('user/profileview', 'service\UsersController@getProfileview');
	Route::get('user/announcement', 'service\UsersController@getAnnouncement');
	Route::get('user/phonenumvalidation', 'service\UsersController@getPhonenumvalidation');
	Route::get('user/instructor_profile', 'service\UsersController@getInstructorProfile');
	Route::get('user/privacy', 'service\UsersController@getPrivacy');
	Route::get('user/terms', 'service\UsersController@getTerms');
	Route::get('user/about', 'service\UsersController@getAbout');
	Route::get('user/country', 'service\UsersController@getCountry');
	Route::get('user/landingpage', 'service\UsersController@getLandingpage');
	Route::post('user/liveclass', 'service\UsersController@postLiveclass');
	Route::get('user/paymentgateway', 'service\UsersController@getPaymentgateway');

	Route::get('course/mycourse', 'service\CourseController@getMycourse');
	Route::get('course/courses', 'service\CourseController@getCourse');
	Route::get('course/course_search', 'service\CourseController@getCoursesearch');
	Route::get('course/course_detail', 'service\CourseController@getCoursedetail');
	Route::get('course/course_detail_new', 'service\CourseController@getCoursedetailnew');
	Route::get('course/categorybasedcourse', 'service\CourseController@getCategoryBasedCourse');
	Route::get('course/wishlist', 'service\CourseController@getWishlist');
	Route::get('course/category', 'service\CourseController@getCategory');
	Route::get('course/view_cart', 'service\CourseController@postViewCart');
	Route::get('course/learner_question_answer', 'service\CourseController@getLearnerQuestionAnswer');

	Route::post('user/registration', 'service\UsersController@postRegister');
	Route::post('user/socialmedia', 'service\UsersController@postSocialmedia');
	Route::post('user/signinmobile', 'service\UsersController@postSigninmobile');
	Route::post('user/forgotpassword', 'service\UsersController@postForgotpass');
	Route::post('user/resetpassword', 'service\UsersController@postResetpass');
	Route::post('user/editprofile', 'service\UsersController@postEditprofile');
	Route::post('user/changepass', 'service\UsersController@postChangepass');
	Route::post('user/otpverification', 'service\UsersController@postOtpverification');	

	Route::post('course/wishlist_add', 'service\CourseController@postWishlistAddEdit');
	Route::post('course/add_cart', 'service\CourseController@postAddCart');
	Route::post('course/buy_now_free', 'service\CourseController@postBuyNowFree');
	Route::post('course/learner_question_add', 'service\CourseController@postLearnerQuestionAdd');
	Route::post('course/learner_answer_add', 'service\CourseController@postLearnerAnswerAdd');
	Route::post('course/buy_now', 'service\CourseController@postBuyNow');

	Route::delete('course/remove_cart', 'service\CourseController@postRemoveCart');
	Route::delete('course/wishlist_remove', 'service\CourseController@postWishlistremove');
	Route::delete('course/delete_course', 'service\CourseController@postDeleteCourse');
	Route::delete('course/learner_question_remove', 'service\CourseController@postLearnerQuestionRemove');
	Route::delete('course/learner_answer_remove', 'service\CourseController@postLearnerAnswerRemove');

$router->group(['prefix' => 'user','middleware' => 'auth'], function($app) {

	$app->post('user/signin', 'service\UsersController@postSignin');
	$app->get('user/profileview', 'service\UsersController@getProfileview');
	$app->post('user/socialmedia', 'service\UsersController@postSocialmedia');
	$app->post('user/signinmobile', 'service\UsersController@postSigninmobile');
	$app->post('user/registration', 'service\UsersController@postRegister');
	$app->post('user/forgotpassword', 'service\UsersController@postForgotpass');
	$app->post('user/resetpassword', 'service\UsersController@postResetpass');
	$app->post('user/editprofile', 'service\UsersController@postEditprofile');
	$app->post('user/changepass', 'service\UsersController@postChangepass');

	$app->get('user/instructor_profile', 'service\UsersController@getInstructorProfile');
	$app->get('user/announcement', 'service\UsersController@getAnnouncement');
	$app->get('user/phonenumvalidation', 'service\UsersController@getPhonenumvalidation');
	$app->post('user/otpverification', 'service\UsersController@postOtpverification');
	
	$app->get('course/category', 'service\CourseController@getCategory');
	$app->get('course/courses', 'service\CourseController@getCourse');
	$app->get('course/mycourse', 'service\CourseController@getMycourse');
	$app->get('course/categorybasedcourse', 'service\CourseController@getCategoryBasedCourse');
	$app->get('course/wishlist', 'service\CourseController@getWishlist');
	$app->post('course/wishlist_add', 'service\CourseController@postWishlistAddEdit');
	$app->delete('course/wishlist_add_remove', 'service\CourseController@postWishlistremove');
	$app->post('course/buy_now_free', 'service\CourseController@postBuyNowFree');
	$app->post('course/buy_now_paid', 'service\CourseController@postBuyNowPaid');
	
	$app->delete('course/delete_course', 'service\CourseController@postDeleteCourse');
	$app->get('course/learner_question_answer', 'service\CourseController@getLearnerQuestionAnswer');
	$app->post('course/learner_question_add', 'service\CourseController@postLearnerQuestionAdd');
	$app->post('course/learner_answer_add', 'service\CourseController@postLearnerAnswerAdd');
	$app->delete('course/learner_question_remove', 'service\CourseController@postLearnerQuestionRemove');
	$app->delete('course/learner_answer_remove', 'service\CourseController@postLearnerAnswerRemove');
});