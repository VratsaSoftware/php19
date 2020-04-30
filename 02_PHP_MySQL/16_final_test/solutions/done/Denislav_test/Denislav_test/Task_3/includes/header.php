<?php 
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Task 3</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Task 3</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="index.php">View firms</a></li>
			<li><a href="create.php">Create a new firm</a></li>
			<li><a href="index.php">Update a firm info</a></li>
			<li><a href="index.php">Soft delete a firm</a></li>
			<li><a href="recycle_bin.php">Restore a firm info</a></li>
			<li><a href="recycle_bin.php">Permanently delete a firm info</a></li>
			<li><a href="recycle_bin.php">Recycle bin</a></li>
		</ul>
	</div>
</nav>