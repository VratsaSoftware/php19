<?php 
$title = 'Destinations';
?>
<title><?= $title; ?></title>
<?php
include 'includes/header.php';
$read_query = "SELECT * FROM `destinations` d LEFT JOIN countries c ON d.`country_id` = c.`country_id` WHERE d.`date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);
if ( isset($_POST['search']) ) {
	if( !empty( $_POST['search_string'])){
		$read_query = "SELECT * FROM `destinations` d JOIN countries c ON d.`country_id` = c.`country_id` WHERE d.`date_deleted` IS NULL AND ";
		$read_query .= "(`destination_name` LIKE '%" . $_POST['search_string'] . "%' OR country_name='" . $_POST['search_string'] . "')" ;
		$result = mysqli_query($conn, $read_query);
		$search = $_POST['search_string'];
		var_dump($search);
	}
}
if( isset( $_POST['sort'])){
	$read_query = "SELECT * FROM `destinations` d JOIN countries c ON d.`country_id` = c.`country_id` WHERE d.`date_deleted` IS NULL ORDER BY " . $_POST['sort_by'] . " " . $_POST['order'];
	$result = mysqli_query($conn, $read_query);
}
if( mysqli_num_rows($result) > 0 ){
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post">
					<div class="col-md-8">
						<input type="text" name="search_string" class="form-control" value="<?php if(isset( $search )) { echo $search;} ?>" placeholder="Enter recipe name ...">
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-success" name="search" value="SEARCH">
					</div>
					<div class="col-md-2">	
						<a href="index.php" class="btn btn-warning">Clear SEARCH</a>
					</div>	
				</form>	
			</div>
			<div class="col-md-6">
				<!-- sorting -->
				<form class="form-horizontal" method="post">
					<div class="col-md-5">
						<select name="sort_by" id="" class="form-control">
							<option value="destination_name">name</option>
							<option value="country_name">Country name</option>
						</select>
					</div>
					<div class="col-md-5">
						<select name="order" id="" class="form-control">
							<option value="asc">low to high</option>
							<option value="desc">high to low</option>
						</select>
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-default" name="sort" value="SORT">
					</div>	
				</form>	
			</div>
		</div>
		<div class="row" style="margin-top: 15px">
			<table class="table table-striped">
				<tr>
					<td>#</td>
					<td>Destinations</td>
					<td>Country name</td>		
					<td>***</td>
					<td>@@</td>		
				</tr>
				<?php
				$num = 1;
				while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?= $num ++?></td>
						<!-- view recipe -->
						<td><?= $row['destination_name'] ?></td>	
						<td><?= $row['country_name'] ?></td>
						<td><a href="update.php?id=<?= $row['destination_id'] ?>" class="btn btn-warning">UPDATE</a></td>
						<td><a href="soft_delete.php?id=<?= $row['destination_id']?>">Soft Delete</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>	
	</div>	
	<?php

} else {
	?>
	<div class="container">	
	<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post">
					<div class="col-md-8">
						<input type="text" name="search_string" class="form-control" value="<?php if(isset( $search )) { echo $search;} ?>" placeholder="Enter recipe name ...">
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-success" name="search" value="SEARCH">
					</div>
					<div class="col-md-2">	
						<a href="index.php" class="btn btn-warning">Clear SEARCH</a>
					</div>	
				</form>	
			</div>
			<div class="col-md-6">
				<form class="form-horizontal" method="post">
					<div class="col-md-5">
						<select name="sort_by" id="" class="form-control">
							<option value="destination_name">name</option>
							<option value="country_name">Country name</option>
						</select>
					</div>
					<div class="col-md-5">
						<select name="order" id="" class="form-control">
							<option value="asc">low to high</option>
							<option value="desc">high to low</option>
						</select>
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-default" name="sort" value="SORT">
					</div>	
				</form>	
			</div>
		</div>	
		<div class="row" style="margin-top: 15px">
			<table class="table table-striped">
				<tr>
					<td>#</td>
					<td>Destinations</td>
					<td>country_name</td>		
					<td>***</td>
					<td>@@</td>		
				</tr>
				<tr>
					<td colspan="4">No results</td>
				</tr>
			
			</table>
		</div>	
	</div>
	<?php
}
?>
<a href="create.php"><button class="btn btn-warning"> Add destination</button></a>
<br><br>
<a href="recycle_bin.php">Recycle Bin</a>
<?php 
include 'includes/footer.php'
?>