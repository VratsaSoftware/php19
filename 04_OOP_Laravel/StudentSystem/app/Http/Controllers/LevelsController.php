<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    public function index(Course $course)
    {
    	$course = Course::find($course)->first();

    	return view('levels.index', compact('course'));
    }
}
