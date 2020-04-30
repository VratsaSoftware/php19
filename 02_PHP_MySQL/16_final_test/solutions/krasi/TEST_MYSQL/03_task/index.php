<?php 
include 'includes/header.php';

//1 destinations
$read_query = "SELECT * FROM `airlines` JOIN countries ON airlines.country_id=countries.country_id WHERE airlines.date_deleted is NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
	
?>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>destination</td>
<!--	<td>date deleted</td>-->
		<td>country</td> 
		<td>CEO</td>
<!--	<td>***</td>
		<td>soft delete</td>-->		
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
			<td>'. $row['country_name'] .'</td>
			<td>'. $row['CEO'] .'</td>		
		</tr>';
		}
	}
?>
		<tr>
			<td></td>
			<td><a href="airlines\index_airlines.php">Edit Airlines</a></td>
			<td></td>
			<td></td>	
		</tr>';
</table>


<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>

<?php 
include 'includes/footer.php'
?>
