<?php 
include 'include/db.php';

$id = $_GET['id'];
$delete_query = "DELETE FROM airlines WHERE airline_id = $id";

$delete_res = mysqli_query($conn, $delete_query);

if( $delete_res ){
	header('Location: recycle.php');
} else {
	die('Deletion failed'.mysqli_error($conn));
}