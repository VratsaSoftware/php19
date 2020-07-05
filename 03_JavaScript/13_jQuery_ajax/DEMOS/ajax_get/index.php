<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>ajax</title>
</head>
<body>
  <h1>Ajax requests</h1>
	<input type="text" name="search">
	<button id="search">Search</button>
  <div>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
	<script type="text/javascript" src="script/jquery-3.5.1.min.js"></script>
<script>
	$('#search').on('click', function(e){
    e.preventDefault();
    let searchString = $('input[name=search]').val();
    
    $.ajax({
            url: './file.php',
            type: 'get',
            data: 'search=' + searchString,
            dataType: 'json',      
            success: function( response ) {
              console.log( response.name )
              console.log( response.age )
              console.log( response.city )
              $('p').text(response.name + ' ' + response.age + ' ' + response.city)
            },
            error: function( xhr, ajaxOptions, thrownError ) {
             console.log( thrownError )             
           }
         }); 

        });
	</script>
</body>
</html>