<?php 
include '../includes/db_connect.php';
$title = 'update recipe';
include '../includes/header_inner.php';
$recipe_id = $_GET['id'];

//table recipes
$recipe_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL AND recipe_id=$recipe_id";

$result = mysqli_query($conn, $recipe_query);
//CASH RESULT
$recipe = mysqli_fetch_assoc($result);

// var_dump($result);
//current recipe products - No need oj joins, because we will use only ids and quantity
$products_query = "SELECT * FROM `recipes_products_queantities_units` rpqu WHERE rpqu.recipe_id = $recipe_id";
$recipe_products_result = mysqli_query($conn, $products_query);
$recipe_products = mysqli_fetch_all($recipe_products_result, MYSQLI_ASSOC);

echo "<pre>";
var_dump($recipe_products);
echo "</pre>";

//available units - !!!! THIS WAY - CASH THE RESULT FOR FUTURE USE
$all_units_query = "SELECT * FROM units";
$all_units_result = mysqli_query($conn, $all_units_query);
$all_units = mysqli_fetch_all($all_units_result, MYSQLI_ASSOC);
// var_dump($all_units);
?>
<div class="container">
	<form method="post" action="update_script.php">
		<input type="hidden" name="recipe_id" value="<?= $recipe_id ?>">
		<p>Update Recipe</p>
		<div class="row">
			<div class="col-md-8">
				<label>Recipe name</label>
				<input class="form-control" type="text" name="recipe_name" value="<?= $recipe['recipe_name'] ?>"><br>
			</div>			
			<div class="col-md-4">
				<label>Recipe preparation time</label>
				<input class="form-control" type="text" name="recipe_prep_time" value="<?= $recipe['prep_time'] ?>"><br>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-12">
				<label class="control-label">Meal type</label>
				<p>In construction ...</p>
			</div>	
		</div>	
		<div class="row">
			<div class="col-md-12">
				<label>Recipe Description</label>
				<input type="hidden" name="recipe_id" value="<?= $recipe['recipe_id']?>">
				<textarea class="form-control" name="recipe_descr"><?= $recipe['recipe_descr']?></textarea><br>
			</div>	
		</div>	
		<?php //echo mysqli_num_rows($result_recipe_products);  ?>

		<?php $product_inputs = 0; 
		while ($product_inputs < 10) {
			?>
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label class="control-label">Product #<?= ($product_inputs+1) ?></label>
						<select class="form-control" name="recipe_products[<?= $product_inputs ?>][product]">
							<option value="">--select product--</option>
							<?php 
							//available products - !!! THIS WAY EVERY TIME WE SEND DB QUERY
							$all_products_query = "SELECT * FROM products";
							$all_products_result = mysqli_query($conn, $all_products_query);

							if( mysqli_num_rows($all_products_result) > 0 ){
								?>
								<?php while($all_product = mysqli_fetch_assoc($all_products_result)){
									?>
								<?php //selecting of all products $product_inputs product of recipe
								$selected = '';
								if( isset( $recipe_products[$product_inputs] ) ){
									//	                           $recipe_products[0]['product_id'] = 1
									if( $all_product['product_id'] == $recipe_products[$product_inputs]['product_id']){
										$selected = "selected=true";
									}
								}
								?>
										<option value="<?= $all_product['product_id']?>" <?= $selected ?>><?= $all_product['product_name']?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4">						
						<label class="control-label">quantity</label>
						<input class="form-control" type="text" name="recipe_products[<?= $product_inputs ?>][quantity]" value="<?php echo isset( $recipe_products[$product_inputs]) ? $recipe_products[$product_inputs]['quantity'] : '' ?>">
					</div>
					<div class="col-md-4">	
						<label class="control-label">Unit #<?= ($product_inputs+1) ?></label>
						<select class="form-control" name="recipe_products[<?= $product_inputs ?>][unit]">
							<option value="">--select unit--</option>
							<?php if( !empty($all_units) ){
								foreach ($all_units as $unit) {
									?>
										<?php //selecting of all products $product_inputs product of recipe
										$selected = '';
										if( isset( $recipe_products[$product_inputs] ) ){
											if( $unit['unit_id'] == $recipe_products[$product_inputs]['unit_id']){
												$selected = "selected=true";
											}
										}
										?>
										<option value="<?= $unit['unit_id']?>" <?= $selected ?>><?= $unit['unit_name']?></option>
								<?php } ?>
							<?php } ?>
						</select><br>							
					</div>
				</div>
			
				<?php			
				$product_inputs++;
			}
			?>
			<input type="submit" name="submit" value="save" class="btn btn-success">	
		</form>
	</div>
	<?php 
	//probable check for empty values
	
	include '../includes/footer.php'
	?>