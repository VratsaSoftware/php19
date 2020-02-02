<?php 

$str = 'Gosho';

$arr = str_split($str);
var_dump($arr);

$mirror = [];
$ind = count($arr)-1; 
for($i = 0; $i < count($arr)/2; $i++){
	if($arr[$i] != $arr[$ind]){
		echo 'not a palindrime';
		break;
	}
}

echo "<pre>";
var_dump($mirror);
echo "</pre>";

$mirror_str = implode('', $mirror);

echo $mirror_str;

