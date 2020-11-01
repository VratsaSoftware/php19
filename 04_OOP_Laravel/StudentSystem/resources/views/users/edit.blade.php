@extends('layouts.admin')

@section('content')
<h1>
	Edit User - using Laravel collective
</h1>
<div class="row">
	<div class="col-sm-8">
		{!! Form::model( $user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}		
			<div class="form-group">
				{!! Form::label('user_name', 'User name:'); !!}
				{!! Form::text('user_name', $user->name, ['class' => 'form-control']) !!}
			</div>	
			<div class="form-group">
				{!! Form::label('user_email', 'User email:') !!}
				{!! Form::label('user_email', 'User email:'); !!}
				{!! Form::email('user_email', $user->email, ['class' => 'form-control']) !!}
			</div>	
			<div class="form-group">
				{!! Form::label('user_password', 'User password:'); !!}				
				{!! Form::password('user_password', ['class' => 'form-control']) !!}
			</div>	
			<div class="form-group">
				{!! Form::label('user_role', 'User role:'); !!}				
				{!! Form::select('user_role', $plucked_roles, $user->role_id, ['class' => 'form-control'] ) !!}				
			</div>	
			<div class="form-group">
				{!! Form::submit('edit', ['class' => 'btn btn-success']) !!}
			</div>	
		{!! Form::close() !!}	
	</div>
</div>
@endsection