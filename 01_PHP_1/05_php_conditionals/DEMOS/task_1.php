<?php 

$var1 = 10;
$var2 = 12;

if( $var1 === $var2 ){
	echo 'equel';
} elseif( $var1 > $var2 ) {
	echo $var1 . ' ' . $var2;
} 	
// } elseif( $var2 > $var1 ){
// 	echo $var2 . ' ' . $var1;
// }
else {
	echo $var2 . ' ' . $var1;
}