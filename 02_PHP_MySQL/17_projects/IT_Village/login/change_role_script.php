<?php 
include ('../includes/db_connect.php');
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
if ($_SESSION['role'] != 'admin') {
	header("Location: profile.php");
}
if (isset($_POST['submit'])) {
	if (is_numeric($_POST['user_id']) && is_numeric($_POST['new_role'])) {
		$user_id_from_post = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
		$user_role_from_post = filter_var($_POST['new_role'], FILTER_SANITIZE_NUMBER_INT);
	}
	else{
		header ("Location: profile.php");
	}

	$user_id = mysqli_real_escape_string($conn, $user_id_from_post);
	$user_role = mysqli_real_escape_string($conn, $user_role_from_post);

	$query = "UPDATE `users` SET `role_id`= ".$user_role." WHERE `user_id` = ".$user_id;
	
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) < 0) {
		die("Error" . mysqli_error($conn));
	}
	else{
		header("Location: change_role.php");
	}
}

