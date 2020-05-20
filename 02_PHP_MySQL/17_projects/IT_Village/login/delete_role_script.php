<?php 

include '../includes/header.php';
include '../includes/db_connect.php';

if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
if ($_SESSION['role'] != 'admin') {
	header("Location: profile.php");
}

if (isset($_POST['submit'])) {
	$role_id = $_POST['role_id'];

	$query = "SELECT `role_id` FROM `roles` WHERE `role_name` = 'user'";

	$result = mysqli_query($conn, $query);

	$user_role_id_arr = mysqli_fetch_assoc($result);
	$user_role_id = $user_role_id_arr['role_id'];


	$query = "UPDATE `users` SET `role_id` = '".$user_role_id."' WHERE `role_id` = '".$role_id."'";

	$result = mysqli_query($conn, $query);

	if ($result) {
		$query = "DELETE FROM `roles` WHERE `role_id` = '".$role_id."'";

		$result = mysqli_query($conn, $query);

		if ($result) {
			$_SESSION['role_delete_successful'] = "You delete this role successfully";
			header("Location: delete_role.php");
		}else{
			$_SESSION['user_error'] = "Sorry you can not deleter this role roght now! Try agsin later!";
			header("Location: delete_role.php");
		}
	}else{
		$_SESSION['user_error'] = "Sorry you can not deleter this role roght now! Try agsin later!";
		header("Location: delete_role.php");
	}
	
}else{
	header("Location: delete_role.php");
}