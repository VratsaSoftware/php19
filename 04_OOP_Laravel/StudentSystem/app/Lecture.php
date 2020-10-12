<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    public function level()
    {
    	return $this->belongsTo('App\Level');
    }
}
