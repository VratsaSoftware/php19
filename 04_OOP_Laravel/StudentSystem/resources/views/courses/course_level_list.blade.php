@extends('layouts.admin')

@section('content')
<h1>Levels list</h1>

@if( Session::has('success_message') )
	{{ Session::get('success_message') }}
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>      
      <th scope="col">Course: {{ $course->course_name }}</th>
    </tr>    
  </thead>
  <tbody>
	@php
	$num = 1
	@endphp
	@foreach( $course->levels as $level )
	<tr>
		<td>{{ $num++ }}</td>
		<td>{{ $level->level_name}}</td>
	</tr>
	@endforeach
</tbody>
</table>
<a href="{{ route( 'add_level_to_course', $course->id ) }}" class="btn btn-success">Add new level</a>
@endsection