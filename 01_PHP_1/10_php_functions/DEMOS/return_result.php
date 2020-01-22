<?php 

function calc_square_perimeter($side){
	
	$perimeter = $side*4;

	return $perimeter;
}


$var = calc_square_perimeter(5);
var_dump($var);
// echo calc_square_perimeter(5);