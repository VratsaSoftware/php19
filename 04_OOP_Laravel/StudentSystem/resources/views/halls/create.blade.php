@extends('layouts.master')
@section('content')

<h2>Add New Hall</h2>

<form action="{{ route('halls.store') }}" method="POST">	
	{{ csrf_field() }}
	<input type="text" name="hall_name">
	<input type="submit" name="submit" value="save">
</form>

@endsection