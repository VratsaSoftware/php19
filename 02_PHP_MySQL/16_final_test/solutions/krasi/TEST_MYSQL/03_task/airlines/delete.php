<?php 
include '../includes/db_connect.php';


$delete_query = "DELETE FROM ".$table_name." WHERE airline_id=".$_GET['id'] ;

$delete_res = mysqli_query($conn, $delete_query);

if( $delete_res ){
	header('Location: recycle_bin.php');
} else {
	die('Deletion failed'.mysqli_error($conn));
}
?>
<p><a href="index_airlines.php" class="btn btn-warning">To airlines</a></p>