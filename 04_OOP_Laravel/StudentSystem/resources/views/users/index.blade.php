@extends('layouts.admin')

@section('content')
<h1>
	Users
</h1>
<ul class="list-group">
	@foreach( $users as $user )
	<li class="list-group-item">
		<a href="{{ route('profile', $user->id)}}">
			{{ $user->name }}
		</a>
	</li>	
	@endforeach
</ul>
@endsection