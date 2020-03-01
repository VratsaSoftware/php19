<?php 
include 'includes/header.php';

//1
$read_query = "SELECT * FROM `units` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
?>
<table border="1">
	<tr>
		<td>#</td>
		<td>unit</td>
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $num ++?></td>
			<td><?= $row['unit_name'] ?></td>		
		</tr>
		<?php
	}
?>
</table>
<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>

<?php 
include 'includes/footer.php'
?>