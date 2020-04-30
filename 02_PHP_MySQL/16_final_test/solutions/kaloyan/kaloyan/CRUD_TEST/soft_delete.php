<?php 
include 'includes/header.php';

$update_query = "UPDATE `destinations` SET `date_deleted`= NOW() WHERE destination_id=". $_GET['id'];

$res = mysqli_query($conn, $update_query);

if($res){
	header('Location: index.php');
}else {
	die('Delete failed' . mysqli_error($conn));
}