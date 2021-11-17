<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseGroups extends Model
{
    protected $table = 'course_groups';
    protected $guarded = ['id'];

    public function webinar() {

        return $this->belongsTo('App\Models\Webinar', 'webinar_id', 'id');

    }
}
