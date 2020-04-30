<?php 

include 'includes/db_connect.php';


$delete_query = "DELETE FROM `companies` WHERE `company_id`=". $_GET['id'] ;

$delete_res = mysqli_query($conn, $delete_query);

header("Location: index.php");