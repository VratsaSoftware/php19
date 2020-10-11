@extends('layouts.admin')

@section('content')
<h1>{{ $user->name }}</h1>
<p>{{ $profile->bio }}</p>
@endsection