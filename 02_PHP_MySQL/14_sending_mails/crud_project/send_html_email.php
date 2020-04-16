<?php
 
if( isset($_POST['sender_email']) ){
//initial test
//set up an admin email that will receive users messages
$to_email = "kokolina1888@gmail.com";
if( isset( $_POST['email_subject'] ) ){
	$subject = 'PRETTY EMAIL subject - ' . $_POST['email_subject'];
} else {
	$subject = 'Default subject';
}
if( isset( $_POST['user_message'] ) ){
	$body = "Hi! This is test email send by PHP Script. Can be set up better :)" . $_POST['user_message'];
} else {
	$body = "Hi! This is test email send by PHP Script. Can be set up better :)";
}

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '. $_POST['sender_email'] ."\r\n".
    'Reply-To: '. $_POST['sender_email'] ."\r\n" .
    'X-Mailer: PHP/' . phpversion();


// Compose a simple HTML email message
$message_body = '<html><body>';
$message_body .= '<h1 style="color:#f40;">' . $to_email . '!</h1>';
$message_body .= '<p style="color:#080;font-size:18px;">' . $_POST['user_message'] . '</p>';
$message_body .= '</body></html>';

//sending email
if ( mail( $to_email, $subject, $message_body, $headers ) ) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
} else {
	echo 'You have to fill in .... /validation requirements/';
}