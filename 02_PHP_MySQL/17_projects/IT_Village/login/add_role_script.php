<?php

if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
if ($_SESSION['role'] != 'admin') {
	header("Location: profile.php");
}
if (!isset($_SESSION['add_role_key'])) {
	header("Location: add_role.php");
}
if (isset($_POST['submit'])) {
	include '../includes/db_connect.php';
	if (is_string($_POST['role_name']) && is_string($_POST['role_description'])) {
		if (count_chars($_POST['role_name']) > 30) {
			header("Location: add_role.php");
		}
		if (count_chars($_POST['role_description']) > 150) {
			header("Location: add_role.php");
		}

		$role_name = filter_var($_POST['role_name'], FILTER_SANITIZE_STRING);
		$role_description = filter_var($_POST['role_description'], FILTER_SANITIZE_STRING);

		$query = "INSERT INTO `roles`(`role_name`, `role_description`) VALUES ('".mysqli_real_escape_string($conn, $role_name)."', '".mysqli_real_escape_string($conn, $role_description)."')";

		$result = mysqli_query($conn, $query);

		if ($result) {
			header("Location: roles.php");
		}
	}
	else{
		header("Location: add_role.php");
	}
}else{
	header("Location: add_role.php");
}