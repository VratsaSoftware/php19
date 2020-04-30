<?php 

include 'includes/header.php';
 
$read_query = "SELECT destinations.destination_name, countries.country_name, destination_id FROM destinations JOIN countries ON destinations.country_id = countries.country_id WHERE destinations.date_deleted IS NULL";
$read_result = mysqli_query($conn, $read_query);
if( isset( $_POST['sort'])){

	$read_query = "SELECT * FROM `destinations` WHERE `date_deleted` IS NULL ORDER BY `destination_name` " . $_POST['order'];
	
	

	$read_result = mysqli_query($conn, $read_query);
}
if( mysqli_num_rows($read_result) > 0 ){
?>
	<div class="col-md-6">
		<form class="form-horizontal" method="post">
			<h3>Sort by name</h3>
			<div class="col-md-5">
				<select name="order" id="" class="form-control">
					<option value="ASC">low to high</option>
					<option value="DESC">high to low</option>
				</select>
			</div>
			<div class="col-md-2">	
				<input type="submit" class="btn btn-default" name="sort" value="SORT">
			</div>	
		</form>	
	</div>


	<table style="margin-left: 50px" class="table table-striped">
		<tr>
			<td>#</td>
			<td>Products</td>
			
		</tr>
	<?php
	$num = 1;
		while($row = mysqli_fetch_assoc($read_result)){

			?>
			<tr>
				<td><?= $num ++?></td>
				<td><?= $row['destination_name'] ?></td>	
			
			</tr>
			<?php
		}
	?>
	</table>
<?php 
}
 ?>