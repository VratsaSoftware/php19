<?php 
include '../includes/db_connect.php';
$title = 'read products';
include '../includes/header_inner.php';


//1
$read_query = "SELECT * FROM `products` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
	?>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-5">
			<a href="create.php" class="btn btn-info">ADD NEW</a>
		</div>
	</div>
	<div class="row">
		<table style="margin-left: 50px" class="table table-striped">
			<tr>
				<td>#</td>
				<td>Product</td>
				<td>Image</td>
				<td>***</td>

			</tr>
			<?php
			$num = 1;
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?= $num ++?></td>
					<td><?= $row['product_name'] ?></td>	
					<td><img src="<?= $row['image'] ?>" width="100"></td>	
					<td>***</td>	
				</tr>
				<?php
			}
			?>
		</table>
	</div>
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>

<?php 
include '../includes/footer.php'
?>