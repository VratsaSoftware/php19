<?php 
//setting loging in two files is a good example why is a good practise 
//to use input type hidden for id of the record 
// you update!!!!!

include '../includes/db_connect.php';

if( !empty($_POST['recipe_name']) ){
		//update recipe
		$update_recipe_data_query = "UPDATE `recipes` SET `recipe_name`='" . $_POST['recipe_name']. "',";
		$update_recipe_data_query .= "`recipe_descr`='" . $_POST['recipe_descr'] . "',`prep_time`='" . $_POST['recipe_prep_time'] . "'";
		$update_recipe_data_query .= ",`meal_type_id`=1, `date_modified`='" . date('Y-m-d H:i:s') . "'";
		$update_recipe_data_query .= " WHERE recipe_id =" . $_POST['recipe_id'];
		
		// var_dump( $update_recipe_data_query );
		$update_res = mysqli_query($conn, $update_recipe_data_query);
			if( !$update_res ){
				die('Update failed!' . mysqli_error($conn));
			}else {
				//do something useful
			}
		//update recipes products			
		
		//step 1 - remove all products in db for this recipe
			$delete_recipe_products_query = "DELETE FROM `recipes_products_queantities_units` WHERE recipe_id=" . $_POST['recipe_id'];
			$delete_res = mysqli_query($conn, $delete_recipe_products_query);

		//step 2 - add products set in current update

			
			foreach ($_POST['recipe_products'] as $product) {
				if( !empty( $product['product']) ){
					var_dump($product);
					$product_query = "INSERT INTO `recipes_products_queantities_units`(`recipe_id`, `product_id`, `quantity`, `unit_id`) ";
					$product_query .= "VALUES (" . (int)$_POST['recipe_id']. "," . (int)$product['product']. "," . (float)$product['quantity']. "," . (int)$product['unit'] . ")";					
					$update_res = mysqli_query($conn, $product_query);				
				}
			}

		//step 3 - check if updated and redirect somewhere
			header("Location: index.php");

	}