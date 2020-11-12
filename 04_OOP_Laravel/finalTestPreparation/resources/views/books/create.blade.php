@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-sm-6 offset-sm-3">
		<h2>Add New Book</h2>
		<form action="{{ route('books.store')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">				
				<label for="title">
					Заглавие
				</label>
				<input type="text" id="title" class="form-control" name="title" value="{{old('title')}}">
				@if($errors->has('title'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('title') }} 
				</div>
				@endif
			</div>
			<div class="form-group">				
				<label for="isbn">
					ISBN
				</label>
				<input type="text" id="isbn" class="form-control" name="isbn" value="{{old('isbn')}}">
				@if($errors->has('isbn'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('isbn') }} 
				</div>
				@endif
			</div>
			<div class="form-group">				
				<label for="price">
					Цена
				</label>
				<input type="text" id="price" class="form-control" name="price" value="{{old('price')}}">
				@if($errors->has('price'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('price') }} 
				</div>
				@endif
			</div>
			<div class="form-group">				
				<label for="info">
					Кратка информация за сюжета на книгата
				</label>
				<textarea name="info" id="info" col="20" rows="5" class="form-control">
					{{ old('info')}}
				</textarea>
				@if($errors->has('info'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('info') }} 
				</div>
				@endif
			</div>
			<div class="form-group">				
				<label for="filename">
					Добавете снимка
				</label>
				<input type="file" name="filename" id="filename">
				@if($errors->has('filename'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('filename') }} 
				</div>
				@endif
			</div>
			<div class="form-group">				
				<label for="date_available">
					Налична от
				</label>
				<input type="date" name="date_available" id="date_available" class="form-control">
				@if($errors->has('date_available'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('date_available') }} 
				</div>
				@endif
			</div>
			<div class="form-group">				
				<label for="author">
					Изберете автор
				</label>
				<select name="author_id" id="author" class="form-control">
					<option>---</option>
					@foreach( $authors as $author )
					<option value="{{ $author->id}}"> {{ $author->name }}</option>
					@endforeach
				</select>
				@if($errors->has('author_id'))
				<div class="col-sm-7 col-sm-offset-1 text-danger">
					{{ $errors->first('author_id') }} 
				</div>
				@endif
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="create" class="btn btn-success">
			</div>
		</form>
	</div>
</div>	

@endsection