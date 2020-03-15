<?php 
include 'includes/header.php';

//1 destinations
$read_query = "SELECT destinations.destination_id, destinations.destination_name, countries.name as country_name FROM `countries` RIGHT JOIN destinations ON (destinations.`country_id`= countries.country_id)";

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
			<td><a href="soft_delete.php?id=<?= $row['destination_id'] ?>">DELETE</a></td>	
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
include 'includes/footer.php'
?>