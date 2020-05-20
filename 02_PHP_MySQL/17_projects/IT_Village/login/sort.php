<?php 
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {
	if (is_numeric($_POST['column']) && is_numeric($_POST['sort_way'])) {
		$column_from_post = filter_var($_POST['column'], FILTER_SANITIZE_NUMBER_INT);
		$sort_way_from_post = filter_var($_POST['sort_way'], FILTER_SANITIZE_NUMBER_INT);
	}
	else{
		header ("Location: profile.php");
	}

	$column = mysqli_real_escape_string($conn, $column_from_post);
	$sort_way = mysqli_real_escape_string($conn, $sort_way_from_post);

	$column_names = [
		1 => "username",
		2 => "wins",
		3 => "losses"
	];
	$sort_way_names = [
		1 => "ASC",
		2 => "DESC"
	];

	$sort = " ORDER BY `".$column_names[$column]."` ".$sort_way_names[$sort_way]."";
}else{
	header("Location: statistics.php");
}