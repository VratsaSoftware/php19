<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
		'title',
         'isbn',
         'price',
         'info',
         'filename',
         'date_available',
         'author_id',
    ];

    protected $dates = ['date_available'];

    public function author()
    {
    	return $this->belongsTo('App\Author');
    }
}
