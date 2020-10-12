@extends('layouts.admin')

@section('content')
<h1>Lectures list</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lecture</th>
      <th scope="col">Level</th>
      <th scope="col">Course</th>
    </tr>
  </thead>
  <tbody>
	
	@if( $lectures )
		@foreach( $lectures as $lecture )
		<tr>
			<td></td>
			<td><a href="{{ route( 'lectures.show', $lecture->id ) }}">{{ $lecture->lecture_name }}</a></td>
			<td><a href="{{ route( 'level.lectures_list', $lecture->level->id ) }}">{{ $lecture->level->level_name }}</a></td>
			<td><a>{{ $lecture->level->course->course_name }}</a></td>
		</tr>
		@endforeach
	@endif
</table>
@endsection