@extends('layouts.master')

@section('content')
<div class="row mt-2 mb-2">
	<div class="col-sm-10">
		<h1>Home Page</h1>
	</div>
	<div class="col-sm-2">
		<a href="{{ route('login')}}" class="btn btn-dark">Login</a>
		<a href="{{ route('register')}}" class="btn btn-dark">Register</a>
	</div>
</div>

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

<img src="{{ asset('storage/home_page.jpg')}}" />

@endsection