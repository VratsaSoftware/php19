<?php 
// var_dump($_GET);
if( !empty($_GET) ){
	if( !empty($_GET['a']) && !empty($_GET['b']) && !empty($_GET['c']) ){
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = $_GET['c'];

		if( ($a + $b + $c) == 180 ){
			echo 'valid triangle';
		} else {
			echo 'triangle not possible';
		}
	}else {
		echo 'Please fill, in the form!';
	}
} else {
	echo 'Please fill, in the form!';
}