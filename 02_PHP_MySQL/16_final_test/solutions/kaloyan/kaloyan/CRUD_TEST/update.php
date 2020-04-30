<?php 
$title = 'Update destination';
include 'includes/header.php';

$id = $_GET['id'];

$select_query = "SELECT * FROM `destinations` WHERE `destination_id`=".$id;

$destinations_result = mysqli_query($conn, $select_query);

if( $destinations_result ){

	$destinations_row = mysqli_fetch_assoc($destinations_result);
}

$read_query = "SELECT * FROM `countries` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

?>
<form method="post" action="" style="padding-left: 50px">
	<input type="hidden" name="destination_id" value="<?= $destinations_row['destination_id'] ?>">
	<p>Enter destination name</p>
	<?php 
		var_dump($destinations_row['destination_name']);
	 ?>
	<input type="text" name="destinations_name" class="form-control" value="<?= $destinations_row['destination_name'] ?>">
	<p>Select Country</p>
	<select name="country_id" class="form-control">
		<option> -- select cuisine -- </option>
		<?php if( mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
		?>
		<option value="<?= $row['country_id'] ?>" <?php if( $row['country_id'] == $destinations_row['country_id']) { echo "selected=true"; } ?>><?= $row['country_name'] ?></option>

		<?php 
			}
		}

		?>
	</select>
	<input type="submit" name="submit" value="save">	
</form>
<?php
if( !empty($_POST)){
	$destination_name = $_POST['destinations_name'];
	$country_id = $_POST['country_id'];
	$destination_id = $_POST['destination_id'];

$update_query = "UPDATE `destinations` SET `destination_name`='$destination_name',`country_id`=$country_id WHERE `destination_id`=" . $destination_id;
//3
$result = mysqli_query($conn, $update_query);

var_dump($result);
if($result){
	echo "Record created successfuly";
	header('Location: index.php');
} else {
	die('Query failed!' . mysqli_error($conn));
}


}
include 'includes/footer.php'
?>