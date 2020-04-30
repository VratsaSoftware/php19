<?php 
include 'airport_connect.php';
include 'header.php';

?>

<form method="post" action="">
	<p>Enter destination</p>
	<input type="text" name="destination">
	<input type="submit" name="submit" value="save">	
</form>
<?php 
//1 
if (isset($_POST['submit'])){

if( isset($_POST['destination'])){
	$destination = $_POST['destination'];
}
};
//2 insert_query
$insert_query = "INSERT INTO `destinations`(`destination_name`) VALUES ('$destination')";
//3
$result = mysqli_query($conn, $insert_query);

var_dump($result);
if($result){
	echo "Recorde created successfuly";
} else {
	die('Query failed!' . mysqli_error($conn));
}



?>