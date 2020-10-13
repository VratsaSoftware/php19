<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = ['name', 
							'start_date', 
							'end_date'];   

	public function levels()
	{
		return $this->hasMany('App\Level');
	}

	public function users()
	{
		return $this->belongsToMany('App\User');
	}
}
