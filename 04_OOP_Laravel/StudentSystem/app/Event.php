<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
 * Get all of the event's comments.
 */
    public function comments()
    {
    	return $this->morphMany('App\Comment', 'commentable');
    }

}
