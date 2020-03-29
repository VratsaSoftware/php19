<?php 
$title = 'recipes';

include '../includes/db_connect.php';

include '../includes/header_inner.php';

//1 - need to display only recipe name
$read_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

//filter by recipe name
if ( isset($_POST['search']) ) {
	if( !empty( $_POST['search_string'])){
																							//LIKE "%%";
		$read_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL AND ";
		$read_query .= "(recipe_name LIKE '%" . $_POST['search_string'] . "%' OR prep_time='" . $_POST['search_string'] . "')" ;

// var_dump($read_query);

		$result = mysqli_query($conn, $read_query);
		$search = $_POST['search_string'];
		var_dump($search);
	}
}
// sort by
if( isset( $_POST['sort'])){
	//use this funcs, because it orders the data not as numbers but as digits - 1, 112, 20, ... 
	//ORDER BY ABS(column_name)
	//ORDER BY CAST(thecolumn AS int)
	$read_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL ORDER BY " . $_POST['sort_by'] . " " . $_POST['order'];
	// $read_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL ORDER BY ABS(" . $_POST['sort_by'] . ") " . $_POST['order'];

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
							<option value="recipe_name">name</option>
							<option value="prep_time">preparation time</option>
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
					<td>Recipes</td>
					<td>Preparation time</td>		
					<td>***</td>		
				</tr>
				<?php
				$num = 1;
				while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?= $num ++?></td>
						<!-- view recipe -->
						<td><a title="виж рецептата" href="view_recipe.php?id=<?= $row['recipe_id'] ?>"><?= $row['recipe_name'] ?></a></td>	
						<td><?= $row['prep_time'] ?></td>
						<td><a href="update.php?id=<?= $row['recipe_id'] ?>" class="btn btn-warning">UPDATE</a></td>
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
							<option value="recipe_name">name</option>
							<option value="prep_time">preparation time</option>
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
					<td>Recipes</td>
					<td>Preparation time</td>		
					<td>***</td>		
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

<?php 
include '../includes/footer.php'
?>