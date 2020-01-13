<?php
	if( !empty($_POST) ){
	$num = $_POST['num'];
	if( ($num) == 5 ){
		echo 'Correct answer!'; 
	} 
	if( ($num) > 5){
		echo 'Number is <';
	} 
	if( ($num) < 5){
		echo 'Number is >';
	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Document</title>
	<style>
		h3 {
			color: #a82006;
		}

	</style>
</head>
	
	<body>
		<form action="one.php" method="post">
			<h3>What is the number?</h3>
			Number is:
			<input type="text" name="num">
			<input type="submit" name="submit" value="Изпращане">
		</form>
	</body>
</html>