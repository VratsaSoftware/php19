@extends('layouts.admin')

@section('content')
<h1>
	Users
</h1>
<ul>
	@foreach( $users as $user )
	<li><a href="{{ route('profile', $user->id)}}">{{ $user->name }}</a></li>
	
	@endforeach
</ul>
@endsection