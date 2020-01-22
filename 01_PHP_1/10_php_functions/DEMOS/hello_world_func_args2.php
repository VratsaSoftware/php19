<?php 

function print_hello_world($tag, $color = 'red'){
	echo "<$tag style='color: ".$color."'>Hello world!</$tag>";
}

$tag = 'h1';
$color = 'yellow';
print_hello_world($tag, $color);

print_hello_world($color);

