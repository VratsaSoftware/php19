<?php 
include 'includes/db_connect.php';
if (isset($_POST['submit'])) {
	if (isset($_POST['company_name']) && isset($_POST['company_category'])) {

		$company_id = $_POST['company_id'];
		$company_name = $_POST['company_name'];
		$company_category = $_POST['company_category'];

		$query = "UPDATE `companies` SET `company_name`= '".$company_name."',`company_categories`= '".$company_category."' WHERE `company_id` = '".$company_id."'";

		$result = mysqli_query($conn, $query);
		// var_dump($result);

		header("Location: index.php");
	}else{
		header("Location: index.php");
	}
}else{
	header("Location: index.php");
}