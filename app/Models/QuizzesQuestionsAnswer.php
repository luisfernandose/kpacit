<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QuizzesQuestionsAnswer extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function getImageAttribute($value)
    {
        return Storage::url($value);
    }
}
