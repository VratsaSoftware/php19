<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="GET">
		a: 
		<input type="text" name="a">
		b:
		<input type="text" name="b">
		c:
		<input type="text" name="c">
		<input type="submit" name="submit" value="submit">		
	</form>
	<?php 
	if( !empty($_GET) ){
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = $_GET['c'];

		if( ($a + $b + $c) == 180 ){
			echo 'valid triangle';
		} else {
			echo 'triangle not possible';
		}
	}
	// var_dump($_GET);
	?>
</body>
</html>