<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="GET">
		number:
		<input type="text" name="number">
		<input type="submit" name="Провери" value="submit">
		
	</form>
	<?php
	$myNum=9;
	if (!empty($_GET)) {
		$number=$_GET['number'];
		if ($number<0||$number>10) {
			echo "Try again!";
		}
		else{
			if ($number>=0&&$number<=10) {
				if ($number==$myNum) {
					echo "Congratulations!";
				} elseif($number>$myNum){
					echo "The number is bigger!";
				}else{
					echo "The number is smaller!";
				}
			}
		}		
	}

	?>
</body>
</html>