<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
{
	public function index()
	{
		$courses = Course::all();

		return view('courses.index', compact('courses'));
	}

	public function courses_levels_list( Course $course )
	{
		$course = Course::find( $course )->first();

		return view( 'courses.course_level_list', compact( 'course' ) );
	}
}
