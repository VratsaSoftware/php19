@extends('layouts.admin')

@section('content')
<h1>Levels list</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Level name</th>
      <th scope="col">Course</th>
    </tr>
  </thead>
  <tbody>
	
	@if( $levels )
		@foreach( $levels as $level )
		<tr>
			<td></td>
			<td>{{ $level->level_name}}</td>
			<td>{{ $level->course->course_name}}</td>
		</tr>
		@endforeach
	@endif
</table>
@endsection