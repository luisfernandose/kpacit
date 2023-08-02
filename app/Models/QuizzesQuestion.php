<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizzesQuestion extends Model
{
    static $multiple = 'multiple';
    static $descriptive = 'descriptive';
    static $twice = 'twice';
    static $simple = 'simple';

    public $timestamps = false;

    protected $guarded = ['id'];

    
    public function quizzesQuestionsAnswers()
    {
        return $this->hasMany('App\Models\QuizzesQuestionsAnswer', 'question_id', 'id');
    }
}
