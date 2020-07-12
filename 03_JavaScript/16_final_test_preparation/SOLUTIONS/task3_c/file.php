<?php 

$response = [];
if( empty( trim($_POST['username']) ) ){
	$response['error']['name'] = 'Field is required!';
}

if( strlen( trim($_POST['password']) ) < 6 ){
	$response['error']['pd'] = 'Password at least 6 characters long!';
}

if( isset($response['error']) ){
	$response['success'] = 'Success!';	
}
	echo json_encode( $error );

