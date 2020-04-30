<?php
	include 'functions.php';

	$sql = "DELETE FROM companies WHERE company_id=" . $_GET['id'];
	$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: index.php");
			exit;
		} else {
			echo '<h3 class="text-center text-secondary">Error: ' . mysqli_error($conn) . '</h3>';			
		}

?>