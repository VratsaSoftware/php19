$('#btn').on('click', function(e){
	e.preventDefault();
	$('.error').remove();
	let username = $('#name').val(), 
		password = $('#pd').val(), flag;

		//validation
		if( !username.trim() ){
			$('#name')
			.before('<p class="error">Field Required</p>');
		}

		if( password.trim().length < 6 ){
			$('#pd')
			.before('<p class="error">Password must be at least 6 characters long!</p>');
		}

})