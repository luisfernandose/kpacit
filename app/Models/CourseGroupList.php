<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseGroupList extends Model
{
    protected $table = 'course_group_lists';
    protected $guarded = ['id'];

    public function users() {

        return $this->hasMany('App\Models\CourseGroupUsers', 'course_group_list_id', 'id');

    }

    public function courses() {

        return $this->hasMany('App\Models\CourseGroups', 'course_group_list_id', 'id');

    }
}
