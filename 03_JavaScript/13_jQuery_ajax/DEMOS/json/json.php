<?php 

$arr = ['name' => 'John', 'age' => 32, 'city' => 'New York'];

// var_dump( json_encode( $arr ) );


$json_string = json_encode( $arr );

echo $json_string;
echo "<p></p>";
var_dump( json_decode( $json_string, true ) );