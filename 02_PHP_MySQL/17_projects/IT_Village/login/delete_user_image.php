<?php 
include '../includes/header.php';
include '../includes/db_connect.php';

if (!isset($_SESSION['loggedin'])) {
	header("Location: login.php");
}

$query = "SELECT `user_image` FROM `users` WHERE `user_id` = '".$_SESSION['user_id']."' LIMIT 1";

$result = mysqli_query($conn, $query);

$file_name_arr = mysqli_fetch_assoc($result);
$file_name = $file_name_arr['user_image'];

$file = "../user_photos/".$_SESSION['username']."/" . $file_name;

if (file_exists($file)) {
    unlink($file);
} else {
  $_SESSION['user_errors'] = "Sorry! You can not delete your image";
  header("Location: profile.php");
}
if (!file_exists($file)) {
	$query = "UPDATE `users` SET `user_image` = NULL WHERE `user_id` = '".$_SESSION['user_id']."'";

	$result = mysqli_query($conn, $query); 

	if ($result) {
		header("Location: profile.php");
		$_SESSION['user_errors'] = false;
	}else{
		$_SESSION['user_errors'] = "Error occurs! Please try again later!";
		header("Location: profile.php");
	}
}else{
	$_SESSION['user_errors'] = "Error occurs! Please try again later!";
	header("Location: profile.php");
}