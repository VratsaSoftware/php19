<?php 
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>RECYLCE BIN</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
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
	<div id="table">
			<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Company</th>
				      <th scope="col">Category</th>
				      <th scope="col">***</th>
				    </tr>
				  </thead>
				  <tbody>

			<?php
				$size = sizeof($database_results[0]);
				for ($i=0; $i < $size; $i++) { 
					$key = $database_results[1][$i];					
					echo '<tr>';
					echo '<th scope="row">' . ($i + 1) . '</th>';
					echo '<td>' . $database_results[0][$key]['company_name'] . '</td>';
					echo '<td>' . $database_results[0][$key]['category_name'] . '</td>';
					echo '<td><a href="delete-forever.php?id=' . $database_results[0][$key]['company_id'] . '">Delete Forever</a></td>';
					echo '</tr>';
				}	
			?>
				</tbody>
			</table>				
		</div>
	</div>
</body>
</html>