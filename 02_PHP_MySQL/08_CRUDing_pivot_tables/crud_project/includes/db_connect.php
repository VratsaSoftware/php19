<?php 
$conn = mysqli_connect('localhost', 'root', '', 'recipes');
mb_internal_encoding("UTF-8");

// if( !$conn ){
// 	die('Connection failed' . mysqli_connect_error() . ' - '. mysqli_connect_errno());
// } else {
// 	echo "Connected successfully!";
// }