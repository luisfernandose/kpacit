<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Quiz;
use App\Models\QuizzesQuestion;

class CanActiveQuiz implements Rule
{   
    public $max_value;
    public $quiz_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {   
        $this->quiz_id=$parameters;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       
        $quiz = Quiz::find( $this->quiz_id);

        if($quiz){
            $max = $quiz->pass_mark;
            $this->max_value = $max;
            $sum = QuizzesQuestion::where('quiz_id', $this->quiz_id)->pluck('grade')->sum();
           
            if ($sum != $max) {
                return false;
            }
        }else{
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.can_active_quiz');
    }
}
