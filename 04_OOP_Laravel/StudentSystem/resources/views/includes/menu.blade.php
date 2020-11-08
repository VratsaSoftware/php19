<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link" href="<?php echo route('homepage') ?>">Home</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
	</li>
	@if( Auth::check() )
		@if( Auth::user()->role->role_name == 'admin')
		<li class="nav-item">
			<a class="nav-link" href="{{ route('users.index') }}">Users</a>
		</li>
		@endif
	
	<li class="nav-item">
		<a class="nav-link" href="{{ route('levels.index') }}">Levels</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('lectures') }}">Lectures</a>
	</li>
	<li class="nav-item">		
		<a class="nav-link" href="{{ route('halls.index') }}">Halls</a>		
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route( 'profile', Auth::id() ) }}">Your Profile</a>				
	</li>
	@endif
</ul>