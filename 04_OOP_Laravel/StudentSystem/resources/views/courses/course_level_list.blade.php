@extends('layouts.admin')

@section('content')
<h1>Levels list</h1>

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
@endsection