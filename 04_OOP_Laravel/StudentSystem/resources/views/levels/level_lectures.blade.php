@extends('layouts.admin')

@section('content')
<h1>Lectures list</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>      
      <th scope="col">Level: {{ $level->level_name }}</th>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course: {{ $level->course->course_name }}</th>
    </tr>
  </thead>
  <tbody>
	@php
	$num = 1
	@endphp
	@foreach( $level->lectures as $lecture )
	<tr>
		<td>{{ $num++ }}</td>
		<td>{{ $lecture->lecture_name}}</td>
	</tr>
	@endforeach
</tbody>
</table>
@endsection