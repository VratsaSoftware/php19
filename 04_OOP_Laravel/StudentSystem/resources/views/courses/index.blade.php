@extends('layouts.master')
@section('content')

<ul class="list-group">
	@foreach( $courses as $course )
		<li class="list-group-item">
			<a href="{{ route('levels.course.list', $course->id) }}">
				{{ $course->course_name }}
			</a>
		</li>
	@endforeach
</ul>

@endsection