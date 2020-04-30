<?php 
$title = 'create destination';
include 'includes/header.php';
$read_query = "SELECT * FROM `countries` WHERE `date_deleted` IS NULL";
$result = mysqli_query($conn, $read_query);
?>
<form method="post" action="" style="padding-left: 50px">
	<p>Enter city</p>
	<input type="text" name="destination_name" class="form-control">
	<p>Select Countries</p>
	<select name="country_id" class="form-control">
		<option> -- select Countries -- </option>
		<?php if( mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
		?>
		<option value="<?= $row['country_id'] ?>"><?= $row['country_name'] ?></option>
		<?php 
			}
		}

		?>
	</select>
	<input type="submit" name="submit" value="save">	
</form>
<?php
if( !empty($_POST)){
	$destination_name = $_POST['destination_name'];
	$country_id = $_POST['country_id'];

$insert_query = "INSERT INTO `destinations`(`destination_name`, `country_id`) VALUES ('$destination_name', $country_id)";

$result = mysqli_query($conn, $insert_query);

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