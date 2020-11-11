@extends('layouts.app')
@section('content')

<h2>Add New Book</h2>

<div class="row">
	<div class="col-sm-6">
		<table>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			@foreach( $books as $book )
			<tr>
				<td></td>
				
				<td>
					<a href="{{ route( 'books.show', $book->id )}}">
						{{ $book->title }}
					</a>					
				</td>
				<td>
					
					{{ $book->author->name }}

				</td>
				<td><a href="{{ route('books.edit', $book->id )}}">Edit</a></td>
				<td>
					<form method="POST" action="{{ route('books.destroy', $book->id )}}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" name="submit" value="DELETE">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>	

@endsection