<?php
include 'includes/db_connect.php';
if (isset($_POST['submit'])) {
	if (isset($_POST['company_name']) && isset($_POST['company_category'])) {

		$company_name = $_POST['company_name'];
		$company_category = $_POST['company_category'];

		$query = "INSERT INTO `companies`(`company_name`, `company_categories`) VALUES ('".$company_name."', '".$company_category."')";

		$result = mysqli_query($conn, $query);

		header("Location: index.php");
	}else{
		header("Location: index.php");
	}
}else{
	header("Location: index.php");
}