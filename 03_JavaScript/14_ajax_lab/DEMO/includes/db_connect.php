<?php 
$conn = mysqli_connect('localhost', 'root', '', 'ajax_demo');

if( !$conn ){
	die('Connection failed' . mysqli_connect_error() . ' - '. mysqli_connect_errno());
} else {
	// echo "Connected successfully!";
}