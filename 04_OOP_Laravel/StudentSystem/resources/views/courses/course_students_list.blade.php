@extends('layouts.admin')

@section('content')
<h1>Users list</h1>

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
	@foreach( $users as $user )
	<tr>
		<td>{{ $num++ }}</td>
		<td>{{ $user->name}}</td>
	</tr>
	@endforeach
</tbody>
</table>
@endsection