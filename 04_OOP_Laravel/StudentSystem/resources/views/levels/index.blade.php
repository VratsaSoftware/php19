@extends('layouts.admin')

@section('content')
<h1><a href="{{ route('courses.list') }}">{{ $course->course_name }}</a></h1>

<ul class="list-group">	
	@if( $course->levels )
		@foreach( $course->levels as $level )
			<li class="list-group-item">{{ $level->level_name}}</li>
		@endforeach
	@endif
</ul>
@endsection