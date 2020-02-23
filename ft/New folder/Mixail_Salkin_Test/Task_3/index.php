<?php 

$row = 7;
$col = 10;
$arr = [];
$sum = 0;

echo "<table border=1>";
for($i = 0; $i < $row; $i++){
    $sum = $i + 1;
    echo "<tr>";
	for($j = 0; $j < $col; $j++){
        
		$arr[$i][$j] = $sum;
        $sum = $sum + ( $i * 10 ) + 4;	
        echo "<td>{$arr[$i][$j]}</td>";	
    }
    echo "</tr>";
}
echo "</table>";
