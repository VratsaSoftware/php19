<?php 

$arr = [];

$m = 4;
$n = 6;
$num = 1; 

for( $i=0; $i<$m; $i++){
	$arr[$i] = [];
	for( $j=0; $j<$n; $j++){		
		$arr[$i][$j] = $num++;
	}
}

echo "<pre>";
var_dump($arr);
echo "</pre>";

echo "<table>";
for( $row=$m-1; $row>=0; $row-- ){
	echo "<tr>";
	for( $col=$n-1; $col>=0; $col--){
		echo "<td>". $arr[$row][$col]."</td>";
	}
	echo "</tr>";
}
echo "</table>";