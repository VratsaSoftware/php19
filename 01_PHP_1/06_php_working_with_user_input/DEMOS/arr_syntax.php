<?php 

$arr = array(
	'1',
	'25',
	);

$arr_new = [];

$arr_new[] = 1;
$arr_new[] = 4;

var_dump($arr_new);

$arr_new['test'] = 1;
$arr_new['name'] = 4;

var_dump($arr_new);

$arr_new['name'] = 44;
var_dump($arr_new);

