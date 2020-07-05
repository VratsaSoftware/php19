<?php 

// var_dump( $_POST );
$json = [];

$json = ['message' => 'Login unsuccessfull - wrong username or password!'];

echo json_encode( $json );