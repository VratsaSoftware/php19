<?php 

include 'includes/db_connect.php';

$company_id = $_GET['id'];

$query = "UPDATE `companies` SET `date_deleted` = NULL WHERE `company_id` = '".$company_id."'";

$result = mysqli_query($conn, $query);

// var_dump($result);

header("Location: index.php");