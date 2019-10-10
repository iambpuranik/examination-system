<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedExam extends Model
{
   protected $table = 'assigned_exam';
   protected $fillable = ['user_id','exam_id'];
   
}
