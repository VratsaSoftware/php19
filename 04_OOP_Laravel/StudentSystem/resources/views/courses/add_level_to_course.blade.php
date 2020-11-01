@extends('layouts.admin')

@section('content')
<h1>Add level to course</h1>
@if ($errors->any())
<div class="alert alert-danger">      
	<ul>          
		@foreach ($errors->all() as $error)               
		<li>{{ $error }}</li>
		@endforeach       
	</ul>
</div>
@endif

{!! Form::open(['route' => [ 'store_level_to_course', $course->id ]], ['class' => 'form-horizontal']) !!}
	{!! Form::label('non-default-id', 'Level'); !!}
	{!! Form::text('level', old('level'), ['placeholder'=>'Level name here', 'id' => 'non-default-id', 'class' => 'form-control']) !!}
	@if($errors->has('level'))
	<div class="col-sm-7 col-sm-offset-1 text-danger">
		{{ $errors->first('level') }} 
	</div>
	@endif  
	{!! Form::submit('Add level', ['class' => 'btn btn-success', 'id' => 'submit-btn'])!!}
{!! Form::close() !!}
@endsection