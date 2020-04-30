<?php 
include 'airport_connect.php';
include 'header.php';
//1 destinations
$read_query = "SELECT * FROM `destinations` JOIN countries on destinations.destination_id = countries.country_id";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
	
?>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>destination</td>
		<td>country</td>
		<td>***</td>
		<td>soft delete</td>		
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
			<td><a href="delete.php?id=<?= $row['destination_id'] ?>">DELETE</a></td>	
		</tr>
		<?php
	}
?>
</table>

<a href="recycle_bin.php" class="btn btn-warning">Recycle Bin</a>
<a href="create.php">Create destination</a>
<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>