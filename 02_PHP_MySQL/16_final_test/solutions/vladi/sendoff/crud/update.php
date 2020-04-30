<?php 
include 'include/header.php';
$id = $_GET['id'];

$read_query = "SELECT destination_id, airline_name, country_name, destination_name, airlines.date_deleted FROM airlines JOIN countries ON countries.country_id = airlines.country_id JOIN destinations ON destinations.country_id = airlines.country_id WHERE destination_id=".$id;

$result = mysqli_query($conn, $read_query);
if( $result ){
	$row = mysqli_fetch_assoc($result);

}
?>

<form method="post" action="">
	<p>Update <?=$row['airline_name']?>'s Destination</p>
	<input type="text" name="destination" value="<?= $row['destination_name'] ?>">
	<input type="hidden" name="id" value="<?= $row['destination_id']?>">
	<input type="submit" name="submit" value="save">	
</form>
<?php 
if( !empty($_POST) ){
	$name = $_POST['destination'];
	$id = $_POST['id'];

	$update_query = "UPDATE `destinations` SET `destination_name`='". $name ."' WHERE `destination_id`=".$id;

	$update_res = mysqli_query($conn, $update_query);
	if( !$update_res ){
		die('Update failed!' . mysqli_error($conn));
	}else {
		header("Location: index.php");
		echo "Update successful!";
	}
}

if ( !empty($_GET) ){
	$update_query = "UPDATE `airlines` SET `date_deleted`= NULL WHERE airline_id=" . $_GET['id'];

	$update_res = mysqli_query($conn, $update_query);
	if( !$update_res ){
		die('Update failed!' . mysqli_error($conn));
	}else {
		header("Location: index.php");
		echo "Update successful!";
	}
}

include 'include/footer.php'
?>