@extends('layouts.app')
@section('content')




<div class="row">
	<div class="col-sm-6 offset-sm-3">
		@if( Session::has('success') )
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
		@endif
		<h2>List of Books</h2>
		@php 
		$num = 1;
		@endphp
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Book Title</th>
					<th>Book Author</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach( $books as $book )
				<tr>
					<td>
						{{ $num++ }}
					</td>				
					<td>
						<a href="{{ route( 'books.show', $book->id )}}">
							{{ $book->title }}
						</a>					
					</td>
					<td>					
						{{ $book->author->name }}
					</td>
					<td>
						<a href="{{ route('books.edit', $book->id )}}" class="btn btn-warning">
							Edit
						</a>
					</td>
					<td>
						<form method="POST" action="{{ route('books.destroy', $book->id )}}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" name="submit" value="DELETE" class="btn btn-danger">
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>	

@endsection