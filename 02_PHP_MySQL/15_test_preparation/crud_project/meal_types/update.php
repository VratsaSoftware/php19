<?php 
include '../includes/db_connect.php';
$title = 'create units';

include '../includes/header_inner.php';

$id = $_GET['id'];

$select_query = "SELECT * FROM `meal_types` WHERE `meal_type_id`=".$id;
$meal_type_result = mysqli_query($conn, $select_query);
if( $meal_type_result ){
	$meal_type_row = mysqli_fetch_assoc($meal_type_result);
}

var_dump($meal_type_row);


$read_query = "SELECT * FROM `cuisines` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

?>
<form method="post" action="" style="padding-left: 50px">
	<input type="hidden" name="meal_type_id" value="<?= $meal_type_row['meal_type_id'] ?>">
	<p>Enter meal type</p>
	<input type="text" name="meal_type_name" class="form-control" value="<?= $meal_type_row['meal_type_name'] ?>">
	<p>Select national cuisine</p>
	<select name="cuisine_id" class="form-control">
		<option> -- select cuisine -- </option>
		<?php if( mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
		?>
		<option value="<?= $row['cuisine_id'] ?>" <?php if( $row['cuisine_id'] == $meal_type_row['cuisine_id']) { echo "selected=true"; } ?>><?= $row['cuisine_name'] ?></option>

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
	$meal_type_id = $_POST['meal_type_id'];

//2 insert_query
$update_query = "UPDATE `meal_types` SET `meal_type_name`='$meal_type',`cuisine_id`=$cuisine_id WHERE `meal_type_id`=" . $meal_type_id;
//3
$result = mysqli_query($conn, $update_query);

var_dump($result);
if($result){
	echo "Record created successfuly";
} else {
	die('Query failed!' . mysqli_error($conn));
}


}
include '../includes/footer.php'
?>