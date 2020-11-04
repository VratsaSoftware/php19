@extends('layouts.master')

@section('content')
<h1>Home Page</h1>
<a href="{{ route('login')}}">Login</a>
<a href="{{ route('register')}}">Register</a>
@if( $user )
<h2>Hi, {{ $user->name }}</h2>
<p>
	you are <b>{{ $user->role->role_name }}</b>!
</p>
<a class="dropdown-item" href="{{ route('logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	@csrf
</form>
@endif

@endsection