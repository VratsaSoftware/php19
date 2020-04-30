<?php

include 'includes/header.php';

$read_query = "SELECT c.`company_id`, c.`company_name`, cc.`category_name` FROM `companies`c JOIN `company_categories` cc ON c.`company_categories` = cc.`category_id` WHERE c.`date_deleted` IS NULL ";

$result = mysqli_query($conn, $read_query);

//filter 
if ( isset($_POST['search']) ) {
	if( !empty( $_POST['search_string'])){
		$read_query = "SELECT c.`company_id`, c.`company_name`, cc.`category_name` FROM `companies`c JOIN `company_categories` cc ON c.`company_categories` = cc.`category_id` WHERE c.`date_deleted` IS NULL AND (c.`company_name` LIKE '%".$_POST['search_string']."%' OR cc.`category_name` LIKE '%".$_POST['search_string']."%')";

		// var_dump($read_query);

		$result = mysqli_query($conn, $read_query);
		$search = $_POST['search_string'];
		// var_dump($search);
	}
}
// sort 
if( isset( $_POST['sort'])){

	$read_query = "SELECT c.`company_id`, c.`company_name`, cc.`category_name` FROM `companies`c JOIN `company_categories` cc ON c.`company_categories` = cc.`category_id` WHERE c.`date_deleted` IS NULL ORDER BY " . $_POST['sort_by'] . " " . $_POST['order'];
	// var_dump($read_query);
	$result = mysqli_query($conn, $read_query);
}
if( mysqli_num_rows($result) > 0 ){
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post">
					<div class="col-md-8">
						<input type="text" name="search_string" class="form-control" value="<?php if(isset( $search )) { echo $search;} ?>" placeholder="Enter company / category ...">
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-info" name="search" value="search">
					</div>
					<div class="col-md-2">	
						<a href="index.php" class="btn btn-primary">Clear search</a>
					</div>	
				</form>	
			</div>
			<div class="col-md-6">
				<!-- sorting -->
				<form class="form-horizontal" method="post">
					<div class="col-md-5">
						<select name="sort_by" id="" class="form-control">
							<option value="company_name">Company</option>
							<option value="category_name">Category</option>
						</select>
					</div>
					<div class="col-md-5">
						<select name="order" id="" class="form-control">
							<option value="ASC">A to Z</option>
							<option value="DESC">Z to A</option>
						</select>
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-default" name="sort" value="Sort">
					</div>	
				</form>	
			</div>
		</div>
		<p></p>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<td>#</td>
					<td>Company</td>
					<td>Category</td>		
					<td>***</td>
					<td>***</td>	
				</tr>
				<?php
				$num = 1;
				while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?= $num ++?></td>
						<td><?= $row['company_name'] ?></td>	
						<td><?= $row['category_name'] ?></td>
						<td><a href="update.php?id=<?= $row['company_id'] ?>" class="btn btn-warning">Update</a></td>
						<td><a href="soft_delete.php?id=<?= $row['company_id'] ?>" class="btn btn-danger">Soft delete</a></td>
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
						<input type="text" name="search_string" class="form-control" value="<?php if(isset( $search )) { echo $search;} ?>" placeholder="Enter company / category ...">
					</div>
					<div class="col-md-2">	
						<input type="submit" class="btn btn-info" name="search" value="Search">
					</div>
					<div class="col-md-2">	
						<a href="index.php" class="btn btn-primary">Clear search</a>
					</div>	
				</form>	
			</div>
			<div class="col-md-6">
				<form class="form-horizontal" method="post">
					<div class="col-md-5">
						<select name="sort_by" id="" class="form-control">
							<option value="company_name">Company</option>
							<option value="category_name">Category</option>
						</select>
					</div>
					<div class="col-md-5">
						<select name="order" id="" class="form-control">
							<option value="asc">A to Z</option>
							<option value="desc">Z to A</option>
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
					<td>Company</td>
					<td>Category</td>
					<td>***</td>
					<td>***</td>	
				</tr>
				<tr>
					<td colspan="5">No results</td>
				</tr>
			
			</table>
		</div>	
	</div>
	<?php
}

include 'includes/footer.php';