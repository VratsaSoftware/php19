<?php 

// var_dump( $_GET );

$arr = ['name' => 'John', 'age' => 32, 'city' => 'New York'];



$json_string = json_encode( $arr );

echo $json_string;