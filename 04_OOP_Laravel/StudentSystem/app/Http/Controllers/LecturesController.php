<?php

namespace App\Http\Controllers;

use App\Level;
use App\Lecture;
use Illuminate\Http\Request;

class LecturesController extends Controller
{
	public function index( Level $level)
	{
		$level = Level::find( $level )->first();

		return view('levels.level_lectures', compact( 'level' ) );
	}

    public function lectures_list()
    {
    	$lectures = Lecture::all();

    	return view('lectures.lectures_list', compact('lectures'));
    }

    public function show( Lecture $lecture )
    {

    	$lecture = Lecture::findOrFail( $lecture->id );
    	// $lecture = Lecture::find( $lecture );
    	// dd($lecture);
    	return view( 'lectures.show', compact('lecture') );
    }


}
