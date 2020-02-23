<!DOCTYPE html>
<html>
<head>
	<title>Task 3</title>
</head>
<body>

<?php 

$n = 6; //tr
$m = 7; //td

$num_col = 1;
$num_row = 1;
$arr = [];

for ($i=0; $i < $n; $i++) { 
	for ($j=0; $j < $m; $j++) { 
		$arr[$i][$j] = $num_col;

		$num_col += 15;
	}
	$num_row = $num_row +3;
	$num_col = $num_row;
}
echo "<table border=1>";
for ($g=0; $g < $n; $g++) { 
	echo "<tr>";
	for ($h=0; $h < $m; $h++) { 
		echo "<td>" . $arr[$g][$h] ."</td>";
	}
	echo "</tr>";
}
?>
	</table>
</body>
</html>