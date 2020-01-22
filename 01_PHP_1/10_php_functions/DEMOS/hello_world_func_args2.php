<?php 

function print_hello_world($tag, $color){
	echo "<$tag style='color: ".$color."'>Hello world!</$tag>";
}

$tag = 'h1';
$color = 'red';
print_hello_world($tag, $color);

$color = 'blue';
print_hello_world($tag, $color);

