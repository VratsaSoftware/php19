@extends('layouts.admin')

@section('content')
<h1>Events {{ $event->event_name }}</h1>

@if( Auth::check() )
<div class="row">
	<div class="col-sm-8">
		{!! Form::open( ['route' => ['events.add_comment', $event->id]]) !!}		
			<div class="form-group">
				{!! Form::label('body', 'Add comment:') !!}
				{!! Form::textarea('body', old('comment'), ['class' => 'form-control']) !!}
			</div>			
			<div class="form-group">
				{!! Form::submit('Add a comment', ['class' => 'btn btn-success']) !!}
			</div>	
		{!! Form::close() !!}	
	</div>
</div>

@if( $event->comments )
	@foreach( $event->comments as $comment )
		<hr>
		<i>{{ $comment->created_at->diffForHumans() }}</i>
		{{ $comment->body }} by <b>{{ $comment->user->name }}</b>	
	@endforeach
@endif
@endif
@endsection