@extends('layouts.admin')

@section('content')
<h1>Add level to course</h1>
<form method="POST" action="{{ route('store_level_to_course', $course->id )}}">
	{{ csrf_field() }}
	<input type="text" name="level">
	<input type="submit" name="submit" value="Add Level">
</form>
@endsection