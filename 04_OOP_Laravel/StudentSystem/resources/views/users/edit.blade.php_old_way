@extends('layouts.admin')

@section('content')
<h1>
	Edit User
</h1>
<div class="row">
	<div class="col-sm-8">
		<form action="{{ route('users.update', $user->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label>User name:</label>
				<input type="text" name="user_name" class="form-control" value="{{ $user->name }}">
			</div>	
			<div class="form-group">
				<label>User e-mail:</label>
				<input type="text" name="user_email" class="form-control" value="{{ $user->email }}">
			</div>	
			<div class="form-group">
				<label>User password:</label>
				<input type="password" name="user_password" class="form-control" value="">
			</div>	
			<div class="form-group">
				<label>User role:</label>
				<select name="user_role" class="form-control">
					<option> -- select user role -- </option>
					@foreach( $roles as $role )						
						<option value="{{ $role->id }}" @if( $role->id == $user->role_id ) selected="true" @endif>{{ $role->role_name }}</option>
					@endforeach
				</select>
			</div>	
			<div class="form-group">
				<input type="submit" name="submit" value="Edit User" class="btn btn-dark text-white">
			</div>	
		</form>		
	</div>
</div>
@endsection