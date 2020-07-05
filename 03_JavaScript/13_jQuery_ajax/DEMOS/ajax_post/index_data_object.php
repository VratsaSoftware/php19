<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>ajax</title>
</head>
<body>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button id="login">Login</button>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="script/jquery-3.5.1.min.js"></script>
<script>
    $('#login').on('click', function(e){
    e.preventDefault();
    let userName = $('input[name=username]').val(), 
        password = $('input[name=password]').val();
      
        $.ajax({
          url: 'file.php',
          type: 'post',
          data: 'username=' + userName + '&password=' + password,
          dataType: 'json',      
          success: function( response ) {
            //process response 
          },
          error: function(xhr, ajaxOptions, thrownError) {
              //process error
          }
      });
   })
    </script>
</body>
</html>