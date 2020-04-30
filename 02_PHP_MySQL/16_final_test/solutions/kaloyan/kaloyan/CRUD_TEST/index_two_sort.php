<?php 

include 'includes/header.php';
 
$read_query = "SELECT destinations.destination_name, countries.country_name, destination_id FROM destinations JOIN countries ON destinations.country_id = countries.country_id WHERE destinations.date_deleted IS NULL";
$read_result = mysqli_query($conn, $read_query);
if( isset( $_POST['sort'])){
	//use this funcs, because it orders the data not as numbers but as digits - 1, 112, 20, ... 
	//ORDER BY ABS(column_name)
	//ORDER BY CAST(thecolumn AS int)


	$read_query = "SELECT * FROM `destinations` WHERE `date_deleted` IS NULL AND ";
		$read_query .= "destination_name LIKE '%" . $_POST['search_string'] . "%'OR destination_id ='" . $_POST['search_string'] . "'" ;

	// $read_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL ORDER BY ABS(" . $_POST['sort_by'] . ") " . $_POST['order'];
	var_dump($read_query);

	$read_result = mysqli_query($conn, $read_query);
}
if( mysqli_num_rows($read_result) > 0 ){
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post">
					<div class="col-md-5">
						<select name="sort_by" id="" class="form-control">
							<option value="product_name">Product name</option>
							<option value="product_id">Product_id</option>
						</select>
					</div>
					<div class="col-md-5">
						<select name="order" id="" class="form-control">
							<option value="ASC">low to high</option>
							<option value="DESC">high to low</option>
						</select>
					</div>
					
					<div class="col-md-2">	
						<input type="submit" class="btn btn-default" name="sort" value="SORT">
					</div>	
					<div class="col-md-2">	
						<a href="index_two_sort.php" class="btn btn-warning">Clear Sort</a>
					</div>
				</form>	
			</div>
		</div>
	</div>

	<table style="margin-left: 50px" class="table table-striped">
		<tr>
			<td>#</td>
			<td>Products</td>
			<td>Product_id</td>
		</tr>
	<?php
	$num = 1;
		while($row = mysqli_fetch_assoc($read_result)){

			?>
			<tr>
				<td><?= $num ++?></td>
				<td><?= $row['destination_name'] ?></td>
				<td><?= $row['destination_id'] ?></td>
			
			</tr>
			<?php
		}
	?>
	</table>
<?php 
}
 ?>