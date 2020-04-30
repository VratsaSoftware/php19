<?php 
include 'includes/header.php';


$delete_query = "DELETE FROM `destinations` WHERE `destination_id`=". $_GET['id'];
var_dump($delete_query);

$delete_res = mysqli_query($conn, $delete_query);

if( $delete_res ){
	header('Location: Recycle_bin.php');
} else {
	die('Deletion failed'.mysqli_error($conn));
	}