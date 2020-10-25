<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = ['course_name', 'date_start', 'date_end'];
	
	public function levels()
	{
		return $this->hasMany('App\Level');
	}

	public function users()
	{
		return $this->belongsToMany('App\User');
	}
}
