 $('img').on('mouseover', function(){
 	let imgSrc = $(this).attr('src'), 
 	imgTitle = $(this).attr('alt'),
 	titleElement;
 	$('#img-container').find('p').remove();
 	// $('#img-container p').remove();
 	$('#img-container img')
 	.attr('src', imgSrc)
 	.css('width', '600px');

 	titleElement = $('<p>'+ imgTitle +'</p>').css('fontSize', '24px');

 	$('#img-container').prepend(titleElement)
 })