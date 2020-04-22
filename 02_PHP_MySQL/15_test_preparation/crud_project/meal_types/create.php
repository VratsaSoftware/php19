<?php 
include '../includes/db_connect.php';
$title = 'create units';

include '../includes/header_inner.php';

$read_query = "SELECT * FROM `cuisines` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

?>

<form method="post" action="" style="padding-left: 50px">
	<p>Enter meal type</p>
	<input type="text" name="meal_type_name" class="form-control">
	<p>Select national cuisine</p>
	<select name="cuisine_id" class="form-control">
		<option> -- select cuisine -- </option>
		<?php if( mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
		?>
		<option value="<?= $row['cuisine_id'] ?>"><?= $row['cuisine_name'] ?></option>

		<?php 
			}
		}

		?>
	</select>
	<input type="submit" name="submit" value="save">	
</form>
<?php
//1 
if( !empty($_POST)){
	$meal_type = $_POST['meal_type_name'];
	$cuisine_id = $_POST['cuisine_id'];

//2 insert_query
$insert_query = "INSERT INTO `meal_types`(`meal_type_name`, `cuisine_id`) VALUES ('$meal_type', $cuisine_id)";
//3
$result = mysqli_query($conn, $insert_query);

var_dump($result);
if($result){
	echo "Record created successfuly";
} else {
	die('Query failed!' . mysqli_error($conn));
}


}
include '../includes/footer.php'
?>