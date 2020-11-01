@extends('layouts.admin')

@section('content')
<h1>Add level to course</h1>
{{ var_dump( $errors ) }}

@if ( $errors->any() )
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if( Session::has('success_message') )
<div class="alert alert-success">
	{{ Session::get('success_message') }}
</div>
@endif



<form method="POST" action="{{ route('store_level_to_course', $course->id )}}">
	{{ csrf_field() }}
	<input type="text" name="level" placeholder="level" value="{{ old('level') }}">
	@if( $errors->has('level') )
	<div class="col-sm-7 col-sm-offset-1 text-danger">
		{{ $errors->first('level') }}
	</div>
	@endif 
	<input type="text" name="test" placeholder="test" value="{{ old('test') }}">
	@if($errors->has('test'))
	<div class="col-sm-7 col-sm-offset-1 text-danger">
		{{ $errors->first('test') }}
	</div>
	@endif 
	
	<input type="submit" name="submit" value="Add Level">
</form>
@endsection