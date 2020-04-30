<?php 
include 'include/header.php';

?>

<form method="post" action="">
	<p>Enter airline name</p>
	<input type="text" name="name">
	<input type="submit" name="submit" value="save">	
</form>
<?php

if( isset($_POST['name'])){
	$name = $_POST['name'];

$insert_query = "INSERT INTO `airlines`(`airline_name`, `country_id`) VALUES ('$name', '1')";
$result = mysqli_query($conn, $insert_query);

if($result){
	header('Location: index.php');
} else {
	die('Query failed!' . mysqli_error($conn));
}


}
include 'include/footer.php'
?>