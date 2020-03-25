<?php 
include '../includes/header_inner.php';

$recipe_id = $_GET['id'];

//table recipes
$recipe_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL AND recipe_id=$recipe_id";

$result = mysqli_query($conn, $recipe_query);
$recipe = mysqli_fetch_assoc($result);
var_dump($result);


//recipe products
$products_query = "SELECT * FROM `recipes_products_queantities_units` rpqu JOIN products p ON rpqu.product_id=p.product_id";
$products_query.= " JOIN units u ON rpqu.unit_id=u.unit_id WHERE rpqu.recipe_id = $recipe_id";

var_dump($products_query);
$result_recipe_products = mysqli_query($conn, $products_query);

var_dump($result_recipe_products);
?>

<h3><?= $recipe['recipe_name']?></h3>
<p><?= $recipe['recipe_descr']?></p>
<?php 
if( mysqli_num_rows($result_recipe_products) > 0 ){
	?>
	<table style="margin-left: 50px" class="table table-striped">
		<tr>
			<td>#</td>
			<td>Product</td>
			<td>quantity</td>
			<td>unit</td>

		</tr>
		<?php
		$num = 1;
		while($product = mysqli_fetch_assoc($result_recipe_products)){
			?>
			<tr>
				<td><?= $num++ ?></td>
				<td><?= $product['product_name']?></td>
				<td><?= $product['quantity']?></td>
				<td><?= $product['unit_name']?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>
<a href="update.php?id=<?= $recipe['recipe_id']?>">Update</a>
<?php


?>

<?php 
include '../includes/footer.php';
?>