<?php 
include 'airport_connect.php';
include 'header.php';
$destinations_id = $_GET['id'];

$read_query = "SELECT * FROM destinations WHERE destination_id=". $destinations_id;

$result = mysqli_query($conn, $read_query);
if( $result ){
	$row = mysqli_fetch_assoc($result);
}

$countries_query = "SELECT * FROM countries";
$countries_result = mysqli_query($conn, $countries_query);
?>


<form method="post" action="">
	<p>Update destination</p>
	<input type="text" name="destination_name" value="<?= $row['destination_name'] ?>">
	<input type="hidden" name="destination_id" value="<?= $row['destination_id']?>">
	<select name="country">
		<option> -- select country -- </option>
	<?php 
		if( mysqli_num_rows($countries_result) > 0 ){
		while($country_row = mysqli_fetch_assoc($countries_result)){		
	?>
		<option value="<?= $country_row['country_id']?>"
		 <?php 
		 if( $country_row['country_id'] == $row['country_id']){ echo 'selected=true'; } 
		 ?>>
		 <?= $country_row['country_name']?></option>

	<?php } 
		} ?>		
	</select>
	<input type="submit" name="submit" value="save">	
</form>
<?php 
// var_dump(intval($_POST['country']));
// die;
if( !empty($_POST) ){
	$destination_name = $_POST['destination_name'];
	$destination_id = $_POST['destination_id'];
	$country_id = intval($_POST['country']);

$check_query = "SELECT * FROM countries WHERE country_id=$country_id";

$check_result = mysqli_query($conn, $check_query);
var_dump($check_result);
if( mysqli_num_rows($check_result) > 0 ){


	$update_query = "UPDATE `destinations` SET `destination_name`='". $destination_name ."', ";
	$update_query .= "country_id=$country_id WHERE `destination_id`=".$destination_id;

	// var_dump($update_query);
	$update_res = mysqli_query($conn, $update_query);

}

	if( !$update_res ){
		die('Update failed!' . mysqli_error($conn));
	}else {
		header("Location: index.php");
		echo "Update successful!";
	}
}
?>