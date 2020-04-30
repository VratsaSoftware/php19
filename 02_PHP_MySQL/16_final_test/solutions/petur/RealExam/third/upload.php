<?php
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPLOAD</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h3>List new company</h3>
		<form id="login-form" class="form" action="" method="post" enctype="multipart/form-data">
			 <div class="form-group">
                <label for="company_name" class="text-secondary">Company Name:</label><br>
                <input type="text" name="company_name" id="company_name" class="form-control">
            </div>
            <div class="form-group">
            	<label for="category_name" class="text-secondary">Category Name: </label><br>
                <input list="category_name" name="category_name" class="form-control">
                <datalist id="category_name">
                	<?php 
            			$sql = "SELECT category_id, category_name FROM company_categories WHERE date_deleted IS NULL";
            			$result = mysqli_query($conn, $sql);
            			$category_validation = array();
            			if ($result) {
            				while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['category_name'] . '">';
								array_push($category_validation, $row['category_name']);	
								$category_validation[$row['category_name']] = $row['category_id'];										
							}
            			} else {
							echo '<h3 class="text-center text-secondary">Error: ' . mysqli_error($conn) . '</h3>';			
						}
            		?>        
                </datalist>
            </div>
            <div class="form-group">                                
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            </div>   
		</form>
		<?php
			if(isset($_POST['submit'])){ 
				if (strlen(trim($_POST['company_name'])) < 1){
						 echo '<h3 class="text-center text-secondary">Please fill Company name field</h3>';   						 
					} elseif (in_array($_POST['category_name'], $category_validation) == false) {
					echo '<h3 class="text-center text-secondary">Please provide valid Category name</h3>';
				} else {
					$insert_query = "INSERT INTO companies (company_name, company_categories, date_deleted) VALUES ('" . trim(htmlentities($_POST['company_name'])). "', '" . trim(htmlentities($category_validation[$_POST['category_name']])). "', NULL" . ")";
					$result = mysqli_query($conn, $insert_query); 
					header("Location: index.php");
					exit;
				}
			}

		?>
	</div>
</body>
</html>