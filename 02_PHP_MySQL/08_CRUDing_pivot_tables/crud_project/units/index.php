<?php 
include '../includes/db_connect.php';
$title = 'read units';
include '../includes/header_inner.php';


//1
$read_query = "SELECT * FROM `units` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
?>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>unit</td>
		<td>***</td>
		<td>soft delete</td>
		
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $num ++?></td>
			<td><?= $row['unit_name'] ?></td>	
			<td><a href="update.php?id=<?= $row['unit_id'] ?>" class="btn btn-warning">UPDATE</a></td>	
			<td><a href="soft_delete.php?id=<?= $row['unit_id'] ?>">SOFT DELETE</a></td>	
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