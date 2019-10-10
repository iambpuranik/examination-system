<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
   protected $table = 'questions';
   protected $fillable = ['exam_id','question_title','ques_option1','ques_option2','ques_option3','ques_option4','correct_option'];
   
}
