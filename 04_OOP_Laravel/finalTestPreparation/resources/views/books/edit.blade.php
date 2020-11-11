@extends('layouts.app')
@section('content')

<h2>Add New Book</h2>

<div class="row">
	<div class="col-sm-6">
		<form action="{{ route('books.update', $book->id )}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			Заглавие
			<input type="text" name="title" value="{{ $book->title }}">
			ISBN
			<input type="text" name="isbn" value="{{ $book->isbn }}">
			Цена
			<input type="text" name="price" value="{{ $book->price }}">
			Кратка информация за сюжета на книгата
			<textarea name="info">
				{{  $book->info }}
			</textarea>
			<input type="file" name="filename">
			<img width="200" src="{{ asset('storage/' . $book->filename )}}">
			<input type="date" name="date_available" value="{{ $book->date_available}}">
			<select name="author_id">
				<option>---</option>
			@foreach( $authors as $author )
				<option value="{{ $author->id}}" @if( $book->author_id == $author->id ) selected="true" @endif> {{ $author->name }}</option>
			@endforeach
			</select>
			<input type="submit" name="submit" value="create">
		</form>
	</div>
</div>	

@endsection