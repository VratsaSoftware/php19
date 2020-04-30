<?php
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<a href="index.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Back To Index</a>
		<p>
		<?php 
			$read_query = "SELECT companies.company_id as company_id, companies.company_name as company_name, company_categories.category_name as category_name 
					FROM companies 
					LEFT JOIN company_categories ON companies.company_categories = company_categories.category_id 
					WHERE companies.date_deleted IS NOT NULL";	
			$database_results = return_database_info($conn, $read_query);
		?>

		<form id="login-form" class="form" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label for="company_name" class="text-secondary">Company Name:</label><br>
                <input type="text" name="company_name" id="company_name" class="form-control" value=<?php echo '"'. $_GET['name'] . '"' ?>>
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
			<?php
			if(isset($_POST['submit'])){ 
				if (strlen(trim($_POST['company_name'])) < 1){
						 echo '<h3 class="text-center text-secondary">Please fill Company name field</h3>';   						 
					} elseif (in_array($_POST['category_name'], $category_validation) == false) {
					echo '<h3 class="text-center text-secondary">Please provide valid Category name</h3>';
				} else {
					$insert_query = "UPDATE companies SET company_name = '" . trim(htmlentities($_POST['company_name'])). "', company_categories = " . trim(htmlentities($category_validation[$_POST['category_name']])) . " WHERE company_id = " . $_GET['id'];
					$result = mysqli_query($conn, $insert_query); 
					header("Location: index.php");
					exit;
				}
			}
		?>
	</div>
</body>
</html>