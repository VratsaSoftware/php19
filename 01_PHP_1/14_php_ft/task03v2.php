<?php 

$arr = [];
$num = 0;

for($i = 0; $i < 5; $i++){
	$num = ($i+1)*7;
	for($j = 0; $j < 5; $j++){
		$arr[$i][$j] = $num;
		$num += 110;
	}
}

echo "<pre>";
var_dump($arr);
echo "</pre>";