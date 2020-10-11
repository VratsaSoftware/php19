@extends('layouts.admin')

@section('content')
<h1>{{ $course->course_name }}</h1>

<ul>
	
	@if( $course->levels )
		@foreach( $course->levels as $level )
			<li>{{ $level->level_name}}</li>
		@endforeach
	@endif
</ul>
@endsection