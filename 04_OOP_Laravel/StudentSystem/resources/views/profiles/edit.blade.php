@extends('layouts.admin')

@section('content')

{!! Form::model( $profile,  ['route' => ['profiles.update', $profile->id], 
							'method' => 'put', 
							'enctype' => 'multipart/form-data']) !!}

	<h1>{{ $user_data->name }}</h1>
	<p>{{ $profile->bio }}</p>
	
	Image here
	<img src="">
	<div class="row">
		Add a Photo Of You: 
		{!! Form::file('image') !!}	
		{!! Form::text('file') !!}	
	</div>
	<div class="form-group">
		{!! Form::submit('edit', ['class' => 'btn btn-success']) !!}
	</div>	

{!! Form::close() !!}

@endsection