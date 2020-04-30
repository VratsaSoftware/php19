<?php 
include 'include/header.php';

$read_query = "SELECT * FROM `airlines` WHERE `date_deleted` IS NOT NULL";

$result = mysqli_query($conn, $read_query);

if(mysqli_num_rows($result )){
	
?>
<h2>Recycle Bin</h2>
	<table>		
		<tr>
			<td>#</td>
			<td>Airline Name</td>
			<td>Permanent Delete</td>
			<td>Restore</td>
		</tr>
		<?php 
		$num = 1;
		while( $row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?= $num ++?></td>
				<td><?= $row['airline_name']?></td>
				<td><a href="delete.php?id=<?= $row['airline_id']?>">Permanent Delete</a></td>
				<td><a href="update.php?id=<?= $row['airline_id']?>">Restore</a></td>
			</tr>
			<?php
		}

		?>
	</table>

<?php 

}

include 'include/footer.php'
?>