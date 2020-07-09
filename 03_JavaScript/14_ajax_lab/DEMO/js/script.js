//GET

$('#search-input').on('input', function(e){
  let strSearch = $(this).val();
  
  $.ajax({
        url: './file.php',
        type: 'get',
        data: 'search=' + strSearch,
        dataType: 'json',      
        success: function( response ) {
          let products = '';

          $( response ).each(function(index, el) {
            products += '<tr id="' + el.product_id + '"><td>'+ ( index + 1 ) +'</td>';
            products += '<td>'+ el.name +'</td>';
            products += '<td class="rating-td">' + starRating( el.rating ) + '</td></tr>';
          });
        $('tbody').html( products );
          // $('tbody').text( products );
        },
        error: function( xhr, ajaxOptions, thrownError ) {
          console.log( thrownError )             
        }
    });

});

// STARS FUNCTIONS 
const starRating = ( rating ) => {
  //5
  let num = 1;
  let starStr = '';
  while( num <= Math.round( rating )){
    starStr += '<span data-rating="'+ num +'" class="colored-star">*</span>';
    num++;
  }
  if( Math.round( rating ) < 5 ){
    while( num <= 5 ){
      starStr += '<span data-rating="'+ num +'">*</span>';   
      num++;
    } 
  }
  return starStr;
}
//POST
$('tbody').on('click', 'span', function(){
  let rating = $(this).data('rating'), 
      productId = $(this).parents('tr').attr('id'),    
      elementClicked = $(this);
      
  $.ajax({
          url: './file_task2.php',
          type: 'post',
          data: 'rating=' + rating + '&product_id=' + productId,
          dataType: 'json',      
          success: function( response ) {
            console.log(response)
            if( response === 'Success!'){
              let newRating = starRating( rating );
               $(elementClicked).parent().html(newRating);
            }
           
          },
          error: function( xhr, ajaxOptions, thrownError ) {
            // console.log( thrownError )             
          }
      });
})

$('tbody').on('mouseenter', 'span', function(){
  let newRating = $(this).data('rating');
  $(this).addClass('colored-star-preview');
  console.log($(this).data('rating'))
  $(this).siblings().each(function(index, el) {
    console.log($(el).data('rating') < $(this).data('rating'));
    if( $(el).data('rating') < newRating ){
      $(el).addClass('colored-star-preview')
    }
  });
});

$('tbody').on('mouseleave', 'span', function(){
  $(this).removeClass('colored-star-preview')
  
});

