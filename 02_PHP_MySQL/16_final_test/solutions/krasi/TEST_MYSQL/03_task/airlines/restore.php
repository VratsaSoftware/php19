<?php 
include '../includes/db_connect.php';

//$current_date =NULL;
// var_dump($current_date);

$update_query = "UPDATE `".$table_name."` SET `date_deleted`= NULL WHERE `".$table_name."`.airline_id=" . $_GET['id'];
//echo $update_query;
$res = mysqli_query($conn, $update_query);
//var_dump($res);
if($res){
	header('Location: recycle_bin.php');
}else {
	die('Restore failed' . mysqli_error($conn));
}