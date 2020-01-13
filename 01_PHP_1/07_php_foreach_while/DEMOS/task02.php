<?php 

// Създайте масив от числа. Отпечатайте произведението на всички елементи в масива. Input   Output [1, 2, 3]  6 [0, 1, 3, 7, 23] 0 []   Not a valid input [‘name’, 7, 8] Not a valid input

//set variable 
$all = 1;

$arr = [1, 'flag', 3];
$flag = true;

//if empty array 
if( empty($arr) ){
	echo 'Not a valid input';
} else {
	foreach ($arr as $value) {
		if( is_numeric($value) ){
			$all *= $value;
			//$all = $all * $value;
		} else {
			$all = 'Not a valid input';
			// echo 'Not a valid input';
			// $flag = false;
			break;
		}
	}
	// if( $flag == true ){
	// 	echo $all;
	// }
	echo $all;
}