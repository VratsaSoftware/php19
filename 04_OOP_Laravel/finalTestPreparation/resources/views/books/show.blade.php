@extends('layouts.app')
@section('content')

<h2>The Book</h2>

<div class="row">
	<div class="col-sm-6">
		<p>
			{{ $book->title }}
		</p>
		<p>
			{{ $book->author->name }}
		</p>
		<p>
			{{ $book->date_available->diffForHumans() }}
		</p>
	</div>
</div>	

@endsection