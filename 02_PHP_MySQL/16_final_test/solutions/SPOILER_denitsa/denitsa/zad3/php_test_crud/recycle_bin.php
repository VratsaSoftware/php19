<?php 
include 'includes/header.php';

//1
$read_query = "SELECT * FROM `destinations` d LEFT JOIN countries c ON d.`country_id` = c.`country_id` WHERE d.`date_deleted` IS NOT NULL";
$result = mysqli_query($conn, $read_query);

if(mysqli_num_rows($result)){
$num = 1;	
?>
<h2>Recycle Bin</h2>
	<table border="1" class="table table-striped">		
		<tr>
			<td>#</td>
			<td>Unit</td>
			<td>Descr</td>
			<td>Permanent Delete</td>
			<td>Restore</td>
		</tr>
		<?php 
		while( $row = mysqli_fetch_assoc($result)){ 
			?>
			<tr>
				<td><?= $num++ ?></td>
				<td><?= $row['destination_name']?></td>
				<td><?= $row['country_name']  ?></td>
				<td><a href="delete.php?id=<?= $row['destination_id']?>">Permanent Delete</a></td>
				<td><a href="restore.php?id=<?= $row['destination_id']?>">Restore</a></td>
			</tr>
			<?php
		}

		?>
	</table>


<?php 

}

include 'includes/footer.php'
?>
<a href="index.php" class="btn btn-info">Go back</a>