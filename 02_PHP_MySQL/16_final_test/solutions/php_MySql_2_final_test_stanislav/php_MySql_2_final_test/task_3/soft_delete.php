<?php
include 'includes/db_connect.php';


$delete_query = "UPDATE `companies` SET `date_deleted` =NULL WHERE `company_id`=" . $_GET['id'];

$delete_res = mysqli_query($conn, $delete_query);

if( $delete_res ){
header('Location: index.php');
} else {
die('Deletion failed'.mysqli_error($conn));
}