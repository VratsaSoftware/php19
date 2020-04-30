<?php 

include 'includes/db_connect.php';

$current_date = date('Y-m-d');

$query = "UPDATE `companies` SET `date_deleted`= '".$current_date."' WHERE `company_id` = " . $_GET['id'];

$result = mysqli_query($conn, $query);

if ($result) {
	header("Location: index.php");
}
