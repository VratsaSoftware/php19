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
					<th scope="col" class="text-center">created at</th>
					<th scope="col" class="text-center">updates at</th>
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
						@if( isset($user->role) )
							{{ $user->role->role_name }}
						@endif
					</td>
					<td>
						@if( isset($user->created_at) )
						{{ $user->created_at }}
						***
						{{ $user->created_at->diffForHumans() }}
						***
						{{ $user->created_at->toDayDateTimeString() }}
						@endif

					</td>
					<td>
						@if( isset($user->updated_at) )

						@if( $user->updated_at )
							{{ $user->updated_at }}
							***
							{{ $user->updated_at->diffForHumans()}}
							***
							{{ $user->updated_at->toDateTimeString()}}

						@endif
						@endif
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