@extends('layouts.app')
@section('content')

<h2>Add New Book</h2>

<div class="row">
	<div class="col-sm-6">
		<form action="{{ route('books.store')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			Заглавие
			<input type="text" name="title" value="{{old('title')}}">
			ISBN
			<input type="text" name="isbn" value="{{old('isbn')}}">
			Цена
			<input type="text" name="price" value="{{old('price')}}">
			Кратка информация за сюжета на книгата
			<textarea name="info">
				{{ old('info')}}
			</textarea>
			<input type="file" name="filename">
			<input type="date" name="date_available">
			<select name="author_id">
				<option>---</option>
			@foreach( $authors as $author )
				<option value="{{ $author->id}}"> {{ $author->name }}</option>
			@endforeach
			</select>
			<input type="submit" name="submit" value="create">
		</form>
	</div>
</div>	

@endsection