<?php 
include '../includes/header.php';

//1 destinations
$read_query = "SELECT * FROM `airlines` JOIN countries ON airlines.country_id=countries.country_id WHERE airlines.date_deleted is NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
	
?>
<p><a href="create.php" class="btn btn-warning">Add</a></p>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>airlines</td>
<!--	<td>date deleted</td>
		<td>country</td> -->
		<td>***</td>
		<td>soft delete</td>		
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result))
	{if ($row['date_deleted']==NULL)
		{
		echo '
		<tr>
			<td>'. $num ++.'</td>
			<td>'. $row['airline_name'] .'</td>	
			<td><a href="update.php?id='. $row['airline_id'] .'" class="btn btn-warning">UPDATE</a></td>	
			<td><a href="soft_delete.php?id='. $row['airline_id'] .'">DELETE</a></td>	
		</tr>';
		}
	}
?>
</table>

<a href="recycle_bin.php">Recycle Bin</a>
<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>
<a href="../index.php" class="btn btn-warning">Home</a>
<?php 
include '../includes/footer.php'
?>
