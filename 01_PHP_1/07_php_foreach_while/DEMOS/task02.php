<?php 

// Създайте масив от числа. Отпечатайте произведението на всички елементи в масива. Input   Output [1, 2, 3]  6 [0, 1, 3, 7, 23] 0 []   Not a valid input [‘name’, 7, 8] Not a valid input

//set variable 
$all = 1;

$arr = [1, 2, 3];

//if empty array 
if( empty($arr) ){
	echo 'Not a valid input';
} else {
	foreach ($arr as $value) {
		if( is_numeric($value) ){
			$all *= $value;
			//$all = $all * $value;
		} else {
			echo 'Not a valid input';
			break;
		}
	}
	echo $all;
}