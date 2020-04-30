<?php 
include 'include/header.php';

$read_query = "SELECT destination_id, airline_id, airline_name, country_name, destination_name, airlines.date_deleted FROM airlines JOIN countries ON countries.country_id = airlines.country_id JOIN destinations ON destinations.country_id = airlines.country_id WHERE airlines.date_deleted IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
?>
<p style="margin-bottom: 1%; color:lightblue;">Very messy coz no time to order all this how i like, also i wasnt sure what exactly to delete and update so i just did what felt right</p>
<table>
	<tr>
		<td>#</td>
		<td>Airline Name</td>
		<td>Country Name</td>
		<td>Destination Name</td>
		<td>Update</td>
		<td>soft delete</td>
		
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $num ++?></td>
			<td><?= $row['airline_name'] ?></td>
			<td><?= $row['country_name'] ?></td>
			<td><?= $row['destination_name'] ?></td>
			<td><a href="update.php?id=<?= $row['destination_id'] ?>">UPDATE</a></td>	
			<td><a href="recycle.php?id=<?= $row['airline_id'] ?>">SOFT DELETE</a></td>	
		</tr>
		<?php
	}
?>
</table>

<a style="float:right; font-size: 200%" href="bin.php">Recycle Bin</a>
<a style="font-size: 200%" href="create.php">New Airline</a>
<?php
} else {
	die('Query failed!' . mysqli_error($conn));
}

include 'include/footer.php'
?>