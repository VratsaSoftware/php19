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
//this recipe products
$products_query = "SELECT * FROM `recipes_products_queantities_units` rpqu JOIN products p ON rpqu.product_id=p.product_id";
$products_query.= " JOIN units u ON rpqu.unit_id=u.unit_id WHERE rpqu.recipe_id = $recipe_id";



//available units - !!!! THIS WAY - CASH THE RESULT FOR FUTURE USE
$all_units_query = "SELECT * FROM units";
$all_units_result = mysqli_query($conn, $all_units_query);
$all_units = mysqli_fetch_all($all_units_result, MYSQLI_ASSOC);
// var_dump($all_units);
?>
<div class="container">
	<form method="post" action="">
		<p>Update Recipe</p>
		<label>Recipe name</label>
		<input type="text" name="recipe_name" value="<?= $recipe['recipe_name'] ?>"><br>
		<label>Recipe Description</label>
		<input type="hidden" name="recipe_id" value="<?= $recipe['recipe_id']?>">
		<textarea name="recipe_descr"><?= $recipe['recipe_descr']?></textarea><br>
		<?php //echo mysqli_num_rows($result_recipe_products);  ?>

		<?php $product_inputs = 0; 
		while ($product_inputs < 10) {
			?>
			<label>Product #<?= ($product_inputs+1) ?></label>
			<select name="recipe_products[<?= $product_inputs ?>][product]">
				<option value="">--select product--</option>
				<?php 
				//available products - !!! THIS WAY EVERY TIME WE SEND DB QUERY

				$all_products_query = "SELECT * FROM products";
				$all_products_result = mysqli_query($conn, $all_products_query);

				if( mysqli_num_rows($all_products_result) > 0 ){
					?>
					<?php while($all_product = mysqli_fetch_assoc($all_products_result)){
						?>
						<option value="<?= $all_product['product_id']?>"><?= $all_product['product_name']?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<label>quantity</label>
			<input type="text" name="recipe_products[<?= $product_inputs ?>][quantity]">
			<label>Unit #<?= ($product_inputs+1) ?></label>
			<select name="recipe_products[<?= $product_inputs ?>][unit]">
				<option value="">--select unit--</option>
				<?php if( !empty($all_units) ){
					foreach ($all_units as $unit) {

						?>
						<option value="<?= $unit['unit_id']?>"><?= $unit['unit_name']?></option>
					<?php } ?>
				<?php } ?>
			</select><br>	
			<?php			
			$product_inputs++;
		}
		?>
		<input type="submit" name="submit" value="save">	
	</form>
	<pre>
		<?php var_dump($_POST) ?>
	</pre>
</div>
<?php 
if( !empty($_POST) ){
	
}

include '../includes/footer.php'
?>