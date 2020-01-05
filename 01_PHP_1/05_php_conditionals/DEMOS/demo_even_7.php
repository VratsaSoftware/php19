<?php 

$var = 88;

if( $var % 2 == 0 ){
	if( $var % 7 == 0){
		echo $var . ' is dividible to 7'; 
	} else {
		echo $var . ' is NOT dividible to 7'; 
	}//inner if
} else {
	echo $var . " is odd";
}//outer if

if( $var = 0 ){
	echo 'wrong';
}
