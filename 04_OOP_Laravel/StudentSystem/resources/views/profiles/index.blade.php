@extends('layouts.admin')

@section('content')
<h1>{{ $user->name }}</h1>
<p>{{ $profile->bio }}</p>
<ul>
	@foreach( $courses as $course )
	<li> <a href="{{ route('courses.levels_list', $course->id )}}">{{ $course->course_name }}</a></li>
	@endforeach
</ul>
@endsection