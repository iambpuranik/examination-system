<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
   protected $table = 'users_response';
   protected $fillable = ['user_id','question_id','exam_id','user_response','is_correct'];
   
}
