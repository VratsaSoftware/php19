<?php

namespace App\Http\Controllers;

use App\Level;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddLevelToCourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function courses_levels_list( Course $course )
    {
        $course = Course::find( $course )->first();

        return view( 'courses.course_level_list', compact( 'course' ) );
    }

    public function courses_students_list( Course $course )
    {
        $users = Course::find( $course->id )
                ->users()
                ->where('users.role_id', '=', 3)
                ->get();
                // dd( $users );
        // dd( $course->users()->where('users.role_id', '=', 3)->get());
        return view( 'courses.course_students_list', compact( 'users', 'course' ) );

    }

    public function add_level_to_course( Course $course )
    {
        return view('courses.add_level_to_course', compact('course'));
    }

    public function store_level_to_course( AddLevelToCourseRequest $request, Course $course )
    {
        // dd($request);
        $level = Level::create([
            'level_name' => $request->level,
            'course_id'  => $course->id
        ]);

        $condition = false;

        if( $condition ){
            Session::flash('success_message','This is a message!');
        } else {
            Session::flash('success_message','This is a message 2!');
        }

        return redirect()->route('courses.levels_list', $course->id );
        // return redirect()->route('courses.levels_list', $course->id )->with('success_message', 'Успешно добавихте ниво към курса!');
    }
}
