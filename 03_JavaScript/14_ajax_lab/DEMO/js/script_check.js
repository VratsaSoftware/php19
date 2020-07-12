// get 
$('#search-input').on('input', function(e){
// $('#search-btn').on('click', function(e){
    e.preventDefault();
    let searchString = $('input[name=search]').val();
    console.log(searchString)
    
    $.ajax({
        url: './file.php',
        type: 'get',
        data: 'search=' + searchString,
        dataType: 'json',      
        success: function( response ) {
          // console.log( response )
          let tBody = '';
          $(response).each(function(index, el) {
          	let currentProduct = '';
          	let currentRating = convertRating( el.rating, el.product_id );
          	tBody += '<tr><td>'+(index+1)+'</td>';
          	tBody += '<td>'+ el.name + '</td>';
          	tBody += '<td class="rating-td">'+ currentRating + '</td></tr>';    
          });
          	$('tBody').html(tBody);
        },
        error: function( xhr, ajaxOptions, thrownError ) {
        	console.log( thrownError )             
        }
    }); 
});

//POST

const convertRating = ( rating, id ) => {
	let num = 1;
	let stars = '<p id="'+ id +'">';
	while( num <= Math.round( rating ) ){
		stars += '<span class="colored-star" data-val = "' + num + '">*</span>';
		num++;
	}
	if( Math.round( rating < 5 )){
		while( num <= 5 ){
			stars += '<span data-val = "' + num + '">*</span>';
			num++;
		}
	}	
	stars += '</p>';
	return stars;
}

//on hover - change stars color
$('body').on('mouseenter', 'span', function(e){
	// $(this).css({cursor: 'grab', color: '#FDCB04'});
	$(this).addClass('temp-colored-star');
	let upTo = $(this).data('val')
	$(this).siblings('span').each(function(index, el) {
		if( $(el).data('val') < upTo ){
			$(el).addClass('temp-colored-star');
		}
	});
})
$('body').on('mouseleave', 'span', function(e){
	// $(this).removeClass('temp-colored-star');
	$('.temp-colored-star').removeClass('temp-colored-star');
	
})


$('body').on('click', 'span', function(e){
	const clickedStar = $(this),
	//data
	rating = $(clickedStar).data('val'), productId = $(clickedStar).parents('p').attr('id');
	console.log(rating, productId)
    $.ajax({
        url: 'file_task2.php',
        type: 'post',
        data: 'rating=' + rating + '&product_id=' + productId,
        dataType: 'json',      
        success: function( response ) {
          let rating = convertRating( response, productId );
          $(clickedStar).parents('.rating-td').html(rating);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //process error
        }
      });
   })