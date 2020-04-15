<?php 
if( isset($_POST['sender_email']) ){
//initial test
//set up an admin email that will receive users messages
$to_email = "kokolina1888@gmail.com";
if( isset( $_POST['email_subject'] ) ){
	$subject = $_POST['email_subject'];
} else {
	$subject = 'Default subject';
}
if( isset( $_POST['user_message'] ) ){

	$body = "Hi! This is test email send by PHP Script. Can be set up better :)" . $_POST['user_message'];
} else {
	$body = "Hi! This is test email send by PHP Script. Can be set up better :)";
}

$headers = "From: " . $_POST['sender_email'];
 
if ( mail( $to_email, $subject, $body, $headers ) ) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
} else {
	echo 'You have to fill in .... /validation requirements/';
}