<?php 

include 'includes/header.php';
//1 count number of results
$count_products_query = "SELECT COUNT(*) AS number_of_products FROM `destinations` WHERE `date_deleted` IS NULL";
$result_count = mysqli_query($conn, $count_products_query);
if( $result_count ){
	$row_count = mysqli_fetch_assoc( $result_count );
	// var_dump($row_count['number_of_products']);
}

//2 set results per page to display
$products_per_page = 1;

//3 calculate pages for pagination
$number_of_pages = $row_count['number_of_products']/$products_per_page;
$number_of_pages = ceil($number_of_pages);


//4 - see pagination block

//5 - set default page parameter in the url leading to this script - 
//first time we visit this page - we retrieve the first set result
//see ../includes/header_inner.php';

//6 get current page number from the request
if (!isset($_GET['page'])) {
	$current_page = 1;
}
else{
	$current_page = $_GET['page'];
}


//7 set page param in the links in the pagination block, see below

//8 retrieve set of products, LIMIT = products_per_pages, skip = (current_page - 1)*products_per_page
$limit = $products_per_page;
$skip = ( $current_page - 1 ) * $products_per_page;
$read_query = "SELECT destinations.destination_name, countries.country_name, destination_id FROM destinations JOIN countries ON destinations.country_id = countries.country_id WHERE destinations.date_deleted IS NULL LIMIT $skip, $limit";
 //var_dump($read_query);

$result = mysqli_query($conn, $read_query);

// 9 - set dinamically active class - the current page number to be distinguished among others - see bellow
//10 - set previous and next link  - see bellow
//11 HW - set first and last page link - see bellow
//12 - hide previous - if we are on the first page - see bellow
//13 - hide next - if we are on the last page
//14 optional - set number of each result - first page - 1-5, second page 6-10 etc - see bellow

if( mysqli_num_rows($result) > 0 ){
	?>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-5">
			<a href="create.php" class="btn btn-info">ADD NEW</a>
		</div>
	</div>
	<div class="row">
		<table style="margin-left: 50px" class="table table-striped">
			<tr>
				<td>#</td>
				<td>Destination</td>
				<td>Country</td>
				

			</tr>
			<?php
			// 14 optional - set number of each result - first page - 1-5, second page 6-10 etc
			$num = (( $current_page - 1 ) * $products_per_page) + 1;
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>					
					<td><?= $num ++?></td>
					<td><?= $row['destination_name'] ?></td>	
					<td><?= $row['country_name'] ?></td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
	<!-- pagination -->
	<nav aria-label="..." style="margin-left: 50px">
  		<ul class="pagination">
  			<!-- disable if first page -->
  			<?php 
  			//10 check we are not on the first page
  			if( $current_page != 1 ){ 
  				//previous link must lead to page - 1
  				$previous_num = $current_page - 1;
  				?>
  				<li><a href="index_paginating.php?page=1"><span aria-hidden="true">&larr;</span> First</a></li>
				<li class="previous"><a href="index_paginating.php?page=<?= $previous_num ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
  			<?php } ?>
  			<!-- step 4 - display number os pages in the pagination block -->
  			<?php 
  			$current_num = 1;
  			while ($current_num <= $number_of_pages ){ ?>
				<!-- 7 - set page number requested in each page button -->
				<!-- 9 - set dinamically active class - the current page number to be distinguished among others -->
				<?php 
				$active_class = '';
				if( $current_page == $current_num ){
					$active_class = 'active';
				}
				?>
	  			<li class="<?= $active_class ?>"><a href="index_paginating.php?page=<?= $current_num ?>"><?= $current_num ?><span class="sr-only">(current)</span></a></li>
	  			<?php $current_num++; } ?>
	  			<?php 
	  			// 12 - check this is not the last page
	  			if( $current_page != $number_of_pages ){
	  				//next link must lead to page + 1
  					$next_num = $current_page + 1;
	  			?>
	    		<li class="next"><a href="index_paginating.php?page=<?= $next_num ?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
	    		<li class="next"><a href="index_paginating.php?page=<?= $number_of_pages ?>">Last <span aria-hidden="true">&rarr;</span></a></li>
	    	<?php } ?>
  		</ul>
	</nav>
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>

