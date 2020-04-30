<?php 
include 'includes/header.php';
$restore_query = "UPDATE destinations set date_deleted = NULL WHERE destination_id = ".$_GET['id'];
$result = mysqli_query($conn, $restore_query);
var_dump($result);
if ($result) {
	header('Location: recycle_bin.php');
}else{
	die('Query failed!'. mysqli_error($conn));
}
?>