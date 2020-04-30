<?php 
include 'includes/header.php';
$destination_id = $_GET['id'];
$read_query = "SELECT * FROM destinations WHERE destination_id=".$destination_id;
$result = mysqli_query($conn, $read_query);
if( $result ){
	$row = mysqli_fetch_assoc($result);
}
?>
<form method="post" action="" class="container">
	<div class="form-group ">
		<p>Update destination name</p>
		<input type="text" name="destination_name" value="<?= $row['destination_name'] ?>" class="form-control">
		<input type="hidden" name="destination_id" value="<?= $row['destination_id']?>">
	</div>
	<input type="submit" name="submit" value="Save" class="btn btn-primary">
	<a href="index.php"><button class="btn btn-default">Cancel</button></a>	
</form>
<?php 
if( !empty($_POST) ){
	$destination_name = $_POST['destination_name'];
	$destination_id = $_POST['destination_id'];

	$update_query = "UPDATE `destinations` SET `destination_name`='". $destination_name ."' WHERE `destination_id`=".$destination_id;

	// var_dump($update_query);
	$update_res = mysqli_query($conn, $update_query);
	if( !$update_res ){
		die('Update failed!' . mysqli_error($conn));
	}else {
		header("Location: index.php");
		echo "Update successful!";
	}
}
include 'includes/footer.php'
?>