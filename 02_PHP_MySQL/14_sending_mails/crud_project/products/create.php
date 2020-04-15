<?php 
include '../includes/db_connect.php';
$title = 'create product';

include '../includes/header_inner.php';
?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3><i>Create new product and notify subscribed users for this IMPORTANT event!</i></h3>
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label" for="product-name">Enter product name</label>
				<input type="text" id="product-name" name="product_name" class="form-control">
			</div>
			<div class="form-group">

				<label for="product-image">Product image</label>
				<input type="file" id="product-image" name="product_image" value="../uploads/5865.jpg">
			</div>
			<button type="submit" class="btn btn-default">Save</button>
		</form>
	</div>
</div>
<?php  
echo time();
if( !empty( $_POST ) && !empty( $_FILES ) ){ 
	if( !empty( $_POST['product_name'] ) && !empty( $_FILES['product_image'] ) ){

		if ($_FILES['product_image']['size'] > 100000) { 
       		die('upload file up to 100kb');
   		 } 
//1 
//var_dump($_FILES);
//save file to desired folder
//the upload dir must exist - created before first upload
// $allowed_file_extensions = ['mp3, wav'];

// $filename = $_FILES['product_image']['name'];

// $file_arr = explode('.', $filename);

// if( in_array($file_arr[0], $allowed_file_extensions)){

// }

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
			//notify subscribed for news users for the event of NEW PRODUCT being created
			//EMAIL NOTIFICATION STEP - 1 - get sybscribed users email
			$emails_to = ['kokolina1888@gmail.com', 'mile.tomova@gmail.com', 'kokolina18@abv.bg'];

			//EMAIL NOTIFICATION STEP - 2 - set up email variables
			$subject = "New Product has been added to our APP:" . $product_name ;
			$body = "Hi,nn This is test email send by PHP Script";
			// $headers = "From: sender\'s email"; - all emails will be sent from admin email - you can set it up as a constant, in sendmail.ini file, or pass a value if sender email has a dynamic value

			//EMAIL NOTIFICATION STEP - 3 - send mails

			foreach ($emails_to as $email) {
				if (mail($email, $subject, $body)) {
    				echo "Email successfully sent to $email...";
				} else {
				    echo "Email sending failed...";
				}
			}
			
			//
		} else {
			die('Query failed!' . mysqli_error($conn));
		}

	}
} else {
	echo 'Please, fill in the form!';
}

include '../includes/footer.php'
?>