<?php
	include 'functions.php';
?>
<!DOCTYPE html>
<html lang="bg"> 
<head>
	<title>Exam - 2020-04-26</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php 	
		if (isset($_GET['ord'])){
			$order = return_order_variable($_GET['ord']);
		} else {
			$order = 'companies.company_name';
		} 

		if (isset($_GET['dir'])){
			$direction = return_order_direction($_GET['dir']);
		} else {
			$direction = 'ASC';
		}	

		if (isset($_GET['page_no'])){
			$page_no = $_GET['page_no'];
		} else {
			$page_no = 1;
		}	

		$total_results = return_database_count($conn);
		$total_records_per_page = 3;
		$total_no_of_pages = ceil($total_results / $total_records_per_page);				
		$offset = ($page_no - 1) * $total_records_per_page;
		$read_query = return_read_query($order, $direction, $total_records_per_page, $offset);
		$database_results = return_database_info($conn, $read_query);
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
				<div class="col-md-8">
				</div>
				<div class="col-md-4">	
					<a href="upload.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">List new company</a>
				</div>
			</div>
		</div>
		<div id="table">
			<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Company <a href="index.php?ord=1&dir=1">&uarr;</a> <a href="index.php?ord=1&dir=0">&darr;</a></th>
				      <th scope="col">Category <a href="index.php?ord=2&dir=1">&uarr;</a> <a href="index.php?ord=2&dir=0">&darr;</a></th>
				      <th scope="col">***</th>
				      <th scope="col">***</th>
				    </tr>
				  </thead>
				  <tbody>

			<?php
				print_database_results($database_results[0], $database_results[1], $offset);		
			?>
				</tbody>
			</table>	
			<?php
				print_pagination($page_no, $total_no_of_pages, $direction, $order)
			?>
		</div>
		<a href="recycle-bin.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Recycle Bin</a>
	</div>
</body>
</html>