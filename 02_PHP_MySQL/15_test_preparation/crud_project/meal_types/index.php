<?php 
include '../includes/db_connect.php';
$title = 'Read Meal Types';
include '../includes/header_inner.php';

//1
$read_query = "SELECT * FROM `meal_types` JOIN cuisines ON meal_types.cuisine_id = cuisines.cuisine_id WHERE meal_types.date_deleted IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
?>
<a href="create.php" class="btn default">Add new meal type</a>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>meal type</td>
		<td>cuisine</td>
		<td>***</td>
		<td>***</td>
		
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result)){

		?>
		<tr>
			<td><?= $num ++?></td>
			<td><?= $row['meal_type_name'] ?></td>	
			<td><?= $row['cuisine_name'] ?></td>	
			<td><a href="update.php?id=<?= $row['meal_type_id'] ?>" class="btn btn-warning">UPDATE</a></td>	
			<td><a href="delete.php?id=<?= $row['meal_type_id'] ?>" class="btn btn-danger">DELETE</a></td>	
		</tr>
		<?php
	}
?>
</table>

<a href="recycle_bin.php">Recycle Bin</a>
<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>

<?php 
include '../includes/footer.php'
?>