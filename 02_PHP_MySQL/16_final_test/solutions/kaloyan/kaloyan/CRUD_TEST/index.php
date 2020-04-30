<?php 
include 'includes/header.php';

$read_query = "SELECT destinations.destination_name, countries.country_name, destination_id FROM destinations JOIN countries ON destinations.country_id = countries.country_id WHERE destinations.date_deleted IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
?>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>Destination</td>
		<td>Countrys</td>	
		<td>Update</td>
		<td>Soft Delete</td>
		<td>DELETE!</td>
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result)){

		?>
		<tr>
			<td><?= $num ++?></td>
			<td><?= $row['destination_name'] ?></td>	
			<td><?= $row['country_name'] ?></td>	
			<td><a href="update.php?id=<?= $row['destination_id'] ?>" class="btn btn-warning">UPDATE</a></td>	
			<td><a href="soft_delete.php?id=<?= $row['destination_id'] ?>" class="btn btn-warning">SOFT DELETE</a></td>	
			<td><a href="delete_index.php?id=<?= $row['destination_id'] ?>" class="btn btn-danger">DELETE</a></td>	
		</tr>
		<?php
	}
?>
</table>

<?php

} 

?>

<?php 
include 'includes/footer.php'
?>