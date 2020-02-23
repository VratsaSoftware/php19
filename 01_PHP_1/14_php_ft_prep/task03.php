<?php 

$num_v = 0;
$num_h = 0;
$arr = [];

for($i = 0; $i < 5; $i++){
	$arr[$i] = [];
	$num_v += 7;
	for($j = 0; $j < 5; $j++){
		$num_h = 110*$j;
		$current_num = $num_h + $num_v;
		$arr[$i][$j] = $current_num;
	}
}

echo "<pre>";
var_dump($arr);
echo "</pre>";