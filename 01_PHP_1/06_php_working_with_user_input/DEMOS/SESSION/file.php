<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>File</h1>
<?php 

session_start();

// var_dump($_POST['username']);
if(!isset( $_SESSION['username'])){
	$_SESSION['username'] = $_POST['username'];
}

echo "Hello, " . $_SESSION['username'];

?>

<a href="contact.php">Contact</a>

</body>
</html>