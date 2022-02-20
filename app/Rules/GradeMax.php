<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\QuizzesQuestion;
use App\Models\Quiz;


class GradeMax implements Rule
{
    public $max_value;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->max_value = 100;
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
       
        
        $quiz_id = request()->input('ajax') ? request()->input('ajax.quiz_id') : request()->input('quiz_id');
        $quiz = Quiz::find($quiz_id);
       
        if($quiz){
            $max =  $this->max_value;
            
            $sum = QuizzesQuestion::where('quiz_id', $quiz_id)->pluck('grade')->sum();
            $sum = (int) $sum + (int) $value;
            if ($sum > $max) {
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
        $msj = trans('validation.max_grade');
        $msj = str_replace(':max', $this->max_value, $msj);
        return $msj;
    }
}
