@extends('layouts.master')
@section('content')

<h2>Add New Hall</h2>
<div class="row">
	<div class="col-sm-6">
		<form action="{{ route('halls.store') }}" method="POST">	
			{{ csrf_field() }}
			<div class="form-group">
				<label>Hall name:</label>
				<input type="text" name="hall_name" class="form-control">
			</div>	
			<div class="form-group">
				<input type="submit" name="submit" value="save" class="btn btn-dark text-white">
			</div>	
		</form>
	</div>
</div>	

@endsection