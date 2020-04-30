<h2>Recycle Bin</h2>
<?php 
include 'includes/header.php';


//1
$read_query = "SELECT * FROM `destinations` WHERE date_deleted IS NOT NULL";

$result = mysqli_query($conn, $read_query);

if(mysqli_num_rows($result )){
	
?>

	<table style="margin-left: 50px" class="table table-striped">		
		<tr>
			<td>#</td>
			<td>Destination</td>
			<td>Permanent Delete</td>
			<td>Restore</td>
		</tr>
		<?php 
		$count = 1;
		while( $row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?=$count++ ?></td>
				<td><?= $row['destination_name']?></td>
				<td><a href="delete.php?id=<?= $row['destination_id']?>" class="btn btn-danger">Permanent Delete</a></td>
				<td><a href="restore.php?id=<?= $row['destination_id']?>" class="btn btn-warning">Restore</a></td>
			</tr>
			<?php
		}

		?>
	</table>

<?php 

}


?>