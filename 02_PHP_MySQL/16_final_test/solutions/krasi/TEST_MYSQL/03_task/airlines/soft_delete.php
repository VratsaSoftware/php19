<?php 
include '../includes/db_connect.php';

$current_date =date('Y-m-d');
// var_dump($current_date);
$update_query = "UPDATE `".$table_name."` SET `date_deleted`='". $current_date."' WHERE airline_id=" . $_GET['id'];

$res = mysqli_query($conn, $update_query);
var_dump($res);

if($res){
	header('Location: index_airlines.php');
}else {
	die('Delete failed' . mysqli_error($conn));
}