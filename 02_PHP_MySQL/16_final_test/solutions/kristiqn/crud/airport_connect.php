<?php 
   
$conn = mysqli_connect("localhost","root","","airport");
if(!$conn){
	die('Connection failed' . mysqli_connect_error() . '-' . mysqli_connect_error());
// }else{
// 	echo "Connected Successfully!";
// }
}


 ?>