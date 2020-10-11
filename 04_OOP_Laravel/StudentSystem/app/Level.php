<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
   protected $fillable = ['level_name', 'course_id'];

   public function course()
   {
   	return $this->belongsTo('App\Course');
   }
}
