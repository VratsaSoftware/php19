<?php 

function print_hello_world($tag){
	echo "<$tag>Hello world!</$tag>";
}

print_hello_world('h1');
print_hello_world('h2');
print_hello_world('h3');
print_hello_world('h4');
print_hello_world('h5');
