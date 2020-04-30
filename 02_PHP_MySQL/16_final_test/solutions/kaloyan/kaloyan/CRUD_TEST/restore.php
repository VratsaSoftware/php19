<?php 
include 'includes/header.php';


$restore_query = "UPDATE `destinations` SET `date_deleted`= NULL WHERE `destination_id`=". $_GET['id'];

var_dump($restore_query);

$delete_res = mysqli_query($conn, $restore_query);

if( $delete_res ){
	header('Location: index.php');
} else {
	die('Update failed'.mysqli_error($conn));
}