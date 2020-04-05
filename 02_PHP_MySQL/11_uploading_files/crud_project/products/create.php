<?php 
include '../includes/db_connect.php';
$title = 'create product';

include '../includes/header_inner.php';
?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label" for="product-name">Enter product name</label>
				<input type="text" id="product-name" name="product_name" class="form-control">
			</div>
			<div class="form-group">
				<label for="product-image">Product image</label>
				<input type="file" id="product-image" name="product_image">
			</div>
			<button type="submit" class="btn btn-default">Save</button>
		</form>
	</div>
</div>
<?php  

if( !empty( $_POST ) && !empty( $_FILES ) ){ 
	if( !empty( $_POST['product_name'] ) && !empty( $_FILES['product_image'] ) ){
//1 
//var_dump($_FILES);
//save file to desired folder
//the upload dir must exist - created before first upload
		$uploaddir = '../uploads/';
		$uploadfile = $uploaddir . basename($_FILES['product_image']['name']);
		$filename = basename($_FILES['product_image']['name']);

		//../uploads/
// step 2 validate file input
		if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
		} else {
			echo "Possible file upload attack!\n";
		}

//step 3 validate data
//step 4 insert data in Data base table

		$product_name = $_POST['product_name'];
//../uploads/product_images/filename.jpg
//../uploads/user_images/user.jpg
		$image = $uploadfile;

		// $insert_query = "INSERT INTO `products`(`product_name`, `image`) VALUES ('$product_name', '$filename')";
		$insert_query = "INSERT INTO `products`(`product_name`, `image`) VALUES ('$product_name', '$uploadfile')";
//3
		$result = mysqli_query($conn, $insert_query);
		
		if($result){
			echo "Record created successfuly";
		} else {
			die('Query failed!' . mysqli_error($conn));
		}

	}
} else {
	echo 'Please, fill in the form!';
}

include '../includes/footer.php'
?>