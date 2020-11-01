@extends('layouts.admin')

@section('content')
<h1>
	Users
</h1>
<div class="row">
	<div class="col-sm-8">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col" class="text-center">#</th>
					<th scope="col" class="text-center">username</th>
					<th scope="col" class="text-center">role</th>
					<th scope="col" class="text-center">***</th>
					<th scope="col" class="text-center">***</th>
				</tr>
			</thead>
			<tbody>				
				
				@foreach( $users as $user )
				<tr>
					<td>{{ $user->id }}</td>
					
					<td>
						<a href="{{ route('profile', $user->id)}}">
							{{ $user->name }}
						</a>
					</td>
					<td>
						{{ $user->role->role_name }}
					</td>
					<td>
						<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
					</td>
					<td>
						Delete
					</td>
				</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
</div>
@endsection