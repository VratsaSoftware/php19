<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Contact us</h2>
	<?php 
	echo "Hello, " . $_SESSION['username'];

	?>
	<a href="file.php">Back</a>
	<a href="logout.php">Log Out</a>
</body>
</html>