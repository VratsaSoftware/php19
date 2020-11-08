@extends('layouts.admin')

@section('content')

@if( Session::has('message') )
<div class="alert alert-success">
	<p>{{ Session::get('message') }}</p>
</div>
@endif

{!! Form::model( $profile,  ['route' => ['profiles.update', $profile->id], 
							'method' => 'put', 
							'enctype' => 'multipart/form-data']) !!}

	<h1>{{ $user_data->name }}</h1>
	<p>{{ $profile->bio }}</p>
	
	
	@if( !empty( $profile->image ) )

	<img src="{{ asset( 'storage/' . $profile->image ) }}" width="200px">

	@endif
	<div class="row">
		Add a Photo Of You: 
		{!! Form::file('image') !!}	
	</div>
	<div class="form-group">
		{!! Form::submit('edit', ['class' => 'btn btn-success']) !!}
	</div>	

{!! Form::close() !!}

@endsection