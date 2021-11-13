<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseGroupUsers extends Model
{
    protected $table = 'course_group_users';
    protected $guarded = ['id'];

    public function user() {

        return $this->belongsTo('App\User', 'user_id', 'id');

    }

}
