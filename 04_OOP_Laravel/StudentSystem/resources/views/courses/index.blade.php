@extends('layouts.master')
@section('content')

<ul class="list-group">
	@foreach( $courses as $course )
		<li class="list-group-item">			
			<a class="btn btn-primary" href="{{ route('courses.students_list', $course->id)}}" role="button">
				Students list
			</a>
			<a href="{{ route('courses.levels_list', $course->id) }}">
				{{ $course->course_name }}
			</a>
		</li>
	@endforeach
</ul>

@endsection