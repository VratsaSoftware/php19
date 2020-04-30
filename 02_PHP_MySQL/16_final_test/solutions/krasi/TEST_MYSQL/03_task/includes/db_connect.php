  
<?php 
$name_db='airport';
$table_name='airlines';

$conn = mysqli_connect('localhost', 'root', '', $name_db);

if( !$conn ){
	die('Connection failed' . mysqli_connect_error() . ' - '. mysqli_connect_errno());
} 
//else {
//	echo "Connected successfully!";}