@extends('layouts.admin')

@section('content')
<h1>Events list</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Event</th>
      <th scope="col">***</th>
      <th scope="col">***</th>
    </tr>
  </thead>
  <tbody>
	
	@if( $events )
		@foreach( $events as $event )
		<tr>
			<td></td>
			<td><a href="{{ route( 'events.show', $event->id ) }}">{{ $event->event_name }}</a></td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
	@endif
</table>
@endsection