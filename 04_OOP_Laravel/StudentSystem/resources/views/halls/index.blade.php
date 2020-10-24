@extends('layouts.master')
@section('content')

<h2>Halls List</h2>
<p>
	<a href="{{ route('halls.create') }}" class="btn btn-success">Add New Hall</a>
</p>
<table class="table table-dark">
	<thead>
		<tr>
			<th scope="col" class="text-center">#</th>
			<th scope="col" class="text-center">Hall</th>
			<th scope="col" class="text-center">***</th>
			<th scope="col" class="text-center">***</th>
		</tr>
	</thead>
	<tbody>
		@php
		$num = 1;
		@endphp
		@foreach( $halls as $hall )
		<tr>
			<td class="text-center"><?= $num++ ?></td>
			<td class="text-center"><a href="{{ route('halls.show', $hall->id) }}" >{{ $hall->hall_name }}</a> </td>
			<td class="text-center"><a href="{{ route('halls.edit', $hall->id) }}" class="btn btn-warning">Edit</a> </td>
			<td class="text-center"><a href="" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>	

@endsection