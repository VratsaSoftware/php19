$('#btn').on('click', function(e){
	e.preventDefault();
	$('.error').remove();
	let username = $('#name').val(), 
	password = $('#pd').val(), flag = true;	
	$.ajax({
		url: './file.php',
		type: 'post',
		data: 'username=' + username + '&password=' + password,
		dataType: 'json',      
		success: function( response ) {
			if( response.success ){
				alert('Success!');
			} else {
				if( response.error ){
					console.log(response.error)
					let error = response.error

					for( let ind in error ){
						console.log(ind)
						$('#' + ind)
						.before('<p class="error">'+error[ind]+'</p>');
					}
				}
			}
		},
			

		error: function( xhr, ajaxOptions, thrownError ) {
            // console.log( thrownError )             
        }
    });
		

	})