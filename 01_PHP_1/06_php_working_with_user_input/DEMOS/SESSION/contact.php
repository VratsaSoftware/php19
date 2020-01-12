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
</body>
</html>