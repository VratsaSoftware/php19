@extends('layouts.master')
@section('content')

<ul>
	@foreach( $courses as $course )
		<li><a href="{{ route('levels.list', $course->id) }}">{{ $course->course_name }}</a></li>
	@endforeach
</ul>

@endsection