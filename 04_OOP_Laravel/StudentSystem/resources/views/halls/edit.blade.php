@extends('layouts.master')
@section('content')

<h2>Edit New Hall</h2>
<form action="{{ route('halls.update', $hall->id ) }}" method="POST">	
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<input type="text" name="hall_name" value="{{ $hall->hall_name }}">
	<input type="submit" name="submit" value="save">
</form>

@endsection