@extends('layouts.master')
@section('content')

<h2>Edit New Hall</h2>
<div class="row">
	<div class="col-sm-6">
		<form action="{{ route('halls.update', $hall->id ) }}" method="POST">	
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label>Hall name:</label>
				<input type="text" name="hall_name" class="form-control" value="{{ $hall->hall_name }}">
			</div>	
			<div class="form-group">
				<input type="submit" name="submit" value="edit" class="btn btn-dark text-white">
			</div>	
		</form>
	</div>

</div>	

@endsection