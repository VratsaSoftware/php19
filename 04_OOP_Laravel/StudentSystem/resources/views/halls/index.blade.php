@extends('layouts.master')
@section('content')

<h2>Halls List</h2>
<p>
	<a href="{{ route('halls.create') }}" class="btn btn-success">Add New Hall</a>
</p>
<ul class="list-group">
	@foreach( $halls as $hall )
		<li class="list-group-item">			
			<a href="{{ route('halls.show', $hall->id) }}">{{ $hall->hall_name }}</a> 
			<a href="{{ route('halls.edit', $hall->id) }}">Edit</a> 
			<a href="">Delete</a>
		</li>
	@endforeach
</ul>

@endsection