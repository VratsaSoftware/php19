<?php 

//Отпечатайте числата от 1 до 1000

for( $i=1; $i<=10; $i+= 1 ){
	echo $i . ' ';
}
echo "<br>";
for( $i=10; $i>=1; $i--){
	echo $i . ' ';
}

echo "<br>";
for( $i=10; $i>=1; ){
	echo --$i . ' ';
}

echo "<br>";
for( $i=10; $i>=1; ){
	echo $i-- . ' ';
}

echo "<br>";
for( $i=10; $i>0; ){
	echo $i-- . ' ';
}