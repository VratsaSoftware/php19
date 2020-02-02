<?php 

$str = 'Gosho';

$arr = str_split($str);
var_dump($arr);

$mirror = [];
$ind = count($arr)-1; 
for($i = 0; $i < count($arr); $i++){
	$mirror[$i] = $arr[$ind];
	$ind--;
}

echo "<pre>";
var_dump($mirror);
echo "</pre>";

$mirror_str = implode('', $mirror);

echo $mirror_str;

