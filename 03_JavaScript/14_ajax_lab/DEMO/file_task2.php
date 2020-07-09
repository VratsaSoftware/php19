<?php 
include 'includes/db_connect.php';

// $read_query = "SELECT rating FROM `oc_product_description` WHERE `product_id` = {$_POST['product_id']} ";

// $result = mysqli_query( $conn, $read_query );

// $product_rating = mysqli_fetch_row($result);
// $new_rating = ($product_rating[0] + $_POST['rating'])/2;

//update rating in DB
$update_query = "UPDATE `oc_product_description` SET `rating`={$_POST['rating']} WHERE `product_id`={$_POST['product_id']}";

	
$update_res = mysqli_query($conn, $update_query);

if( $update_res ){
	echo json_encode('Success!');
} else {
	echo json_encode('Fail!');
}
