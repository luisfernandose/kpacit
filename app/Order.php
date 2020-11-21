<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	
    protected $fillable = [ 'course_id', 'user_id', 'instructor_id', 'order_id', 'transaction_id', 'payment_method', 'total_amount', 'coupon_discount', 'currency', 'currency_icon', 'status', 'duration','enroll_start', 'enroll_expire'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }	
}
