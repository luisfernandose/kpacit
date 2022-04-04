<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TextLesson extends Model
{
    protected $table = 'text_lessons';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];

    public function attachments()
    {
        return $this->hasOne('App\Models\TextLessonAttachment', 'text_lesson_id', 'id');
    }

    public function learningStatus()
    {
        return $this->hasOne('App\Models\CourseLearning', 'text_lesson_id', 'id');
    }

    public function getImageAttribute($value)
    {
        if(!empty($value)){

            return Storage::url($value);
        }
        return $value;
    }
}
