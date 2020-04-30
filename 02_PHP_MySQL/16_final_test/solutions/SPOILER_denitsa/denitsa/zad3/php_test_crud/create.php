<?php 
include 'includes/header.php';
?>
<br>
<br>
<form method="post" action="" class="container">
	<div class="form-group">
		<p>Enter destination name</p>
		<input type="text" name="destination_name" class="form-control">
	</div>
	<input type="submit" name="submit" class="btn btn-primary" value="Save">	
</form>
<?php 

if(isset($_POST['destination_name'])){
	$destination_name = $_POST['destination_name'];
	$insert_query = "INSERT INTO `destinations`(`destination_name`) VALUES ('$destination_name')";
	$result = mysqli_query($conn, $insert_query);
	if($result){
		//echo "Destination created successfuly";
		header('location:index.php');
	}
	else{
		die('Query failed!' . mysqli_error($conn));
	}


}
?>