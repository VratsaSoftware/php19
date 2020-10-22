@extends('layouts.master')
@section('content')

<h2>Single Hall Info</h2>
<div class="jumbotron">
	<h3 class="text-center">{{ $hall->hall_name }}</h3>
</div>
<a href="{{ route('halls.index') }}" class="btn btn-dark text-white">&larr; Back</a>

@endsection