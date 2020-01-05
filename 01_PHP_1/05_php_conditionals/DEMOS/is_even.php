<?php 

$var = 10;

var_dump($var% 2 == 0);
if( $var% 2 == 0 ){
	echo $var . 'is even';
} else {
	echo $var . 'is odd';
}