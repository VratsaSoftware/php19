
<?php 
$rows = 7;
$cols = 5;
$num = 0;
$arr = [];

for($i = 0; $i < $rows; $i++){
	$arr[$i] = [];
	$num = 1*($i+1);
	
	for($j = 0; $j < $cols; $j++){

		$arr[$i][$j] = $num;
		$num += 4;
		if ($i ==1) {
		 	$num+=10;
		}elseif ($i ==2) {
		 	$num+=20;
		}elseif ($i ==3) {
		 $num+=30;
		}elseif ($i ==4) {
		 $num+=40;
		}
	}
}

echo "<table border=1>";
 for($m = 0; $m < $rows; $m++){
 	echo "<tr>";
 	for($n = 0; $n < $cols; $n++){
 		echo "<td>".$arr[$m][$n]."</td>";
 	}
 	echo "</tr>";
 }
echo "</table>";