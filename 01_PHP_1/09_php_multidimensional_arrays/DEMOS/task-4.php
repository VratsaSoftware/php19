<?php 

$arr = [];

$m = 4;
$n = 6;

for( $i=0; $i<$m; $i++){
	$arr[$i] = [];
	for( $j=0; $j<$n; $j++){
		//[0][0]
		//[0][1]
		//....
		//[0][3]

		//[1][0]
		//[1][1]
		//[1][2]
		//[1][3]

		//[3][0]
		//[3][1]
		//[3][2]
		//[3][3]
		$arr[$i][$j] = 1;
	}
}

// echo "<pre>";
// var_dump($arr);
// echo "</pre>";
echo "<table border=1>";
for($row = 0; $row < $m; $row++){
	echo "<tr>";
	for($col=0; $col < $n; $col++){
		echo "<td>". $arr[$row][$col] ."</td>";
	}
	echo "</tr>";
}
echo "</table>";