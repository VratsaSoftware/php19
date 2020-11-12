@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-sm-6 offset-sm-3">
		<h2>The Book</h2>
		<p>
			{{ $book->title }}
		</p>
		<p>
			<img src="{{ asset('storage/' . $book->filename) }}" width="200">
		</p>
		<p>
			{{ $book->author->name }}
		</p>
		<p>
			{{ $book->date_available->diffForHumans() }}
		</p>
		<p>
			{{ $book->isbn }}
		</p>
		<p>
			{{ $book->info }}
		</p>
	</div>
</div>	

@endsection