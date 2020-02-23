<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$arr=[];
	$num=0;
	echo '<table border=1>';

	for ($i=0; $i <5 ; $i++) {
		echo '<tr>';

		$num=$i+1;
		for ($j=0; $j <5 ; $j++) { 
			
			echo '<td>'.$arr[$i][$j]=$num.'</td>';

			$num+=10;

			
		}
		
		
		echo '</tr>';
	}
	echo '</table>';

	?>
	
	
</body>
</html>