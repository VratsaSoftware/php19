<?php 
include 'includes/db_connect.php';

// var_dump( $_GET );

$read_query = "SELECT * FROM `oc_product_description` WHERE `name` LIKE '%{$_GET['search']}%' ORDER BY product_id ASC LIMIT 20";

$result = mysqli_query( $conn, $read_query );

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_string = json_encode( $products );

echo $json_string;