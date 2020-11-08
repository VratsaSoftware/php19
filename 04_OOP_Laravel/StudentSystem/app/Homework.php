<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    /**
 * Get all of the homeworks's comments.
 */
    public function comments()
    {
    	return $this->morphMany('App\Comment', 'commentable');
    }

}
