<?php

	$conn = mysqli_connect('localhost', 'root', '', 'airport'); 

	function print_database_results($songs, $song_keys, $offset){
		$size = sizeof($songs);
		for ($i=0; $i < $size; $i++) { 
			$key = $song_keys[$i];					
			echo '<tr>';
			echo '<th scope="row">' . ($offset + $i + 1) . '</th>';
			echo '<td>' . $songs[$key]['company_name'] . '</td>';
			echo '<td>' . $songs[$key]['category_name'] . '</td>';
			echo '<td><a href="update.php?id=' . $songs[$key]['company_id'] . '&name=' . $songs[$key]['company_name']. '">UPDATE</a></td>';
			echo '<td><a href="delete.php?id=' . $songs[$key]['company_id'] . '&name=' . $songs[$key]['company_name']. '">DELETE</a></td>';
			echo '</tr>';
		}
	}

	function return_order_variable($order_rule){
		switch ($order_rule) {
			case 1:
				return 'companies.company_name';
			case 2:
				return 'company_categories.category_name';
			default:
				return 'companies.company_name';
		}						
	}

	function return_order_direction($order_rule){
		switch ($order_rule) {
			case 1:
				return 'DESC';
			case 0:
				return 'ASC';	
			default:
				return 'ASC';
		}				
	}

	function switch_order_variable($order_rule){
		switch ($order_rule) {
			case 'companies.company_name':
				return 1;
			case 'company_categories.category_name':
				return 2;			
			default:
				return 1;
		}						
	}

	function switch_order_direction($order_rule){
		switch ($order_rule) {
			case 'DESC':
				return 1;
			case 'ASC':
				return 0;	
			default:
				return 0;
		}				
	}

	function return_database_info($conn, $read_query){
		$result = mysqli_query($conn, $read_query);
		$database_results = array();
		$database_results_keys = array();
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$database_results[$row['company_id']] = array('company_id' => $row['company_id'], 'company_name' => $row['company_name'], 'category_name' => $row['category_name']);
				array_push($database_results_keys, $row['company_id']);				
			}
		} else {
			echo '<h3 class="text-center text-secondary">Error: ' . mysqli_error($conn) . '</h3>';			
		}
		$temp_array = array($database_results, $database_results_keys);
		return $temp_array;
	 }

	  function return_songs_count($conn){
		$sql = "SELECT COUNT(song_id) as songs_count FROM songs WHERE song_soft_delete IS NULL";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				return 	$row['songs_count'];			
			}
		} else {
			echo '<h3 class="text-center text-secondary">Error: ' . mysqli_error($conn) . '</h3>';			
		}
	}	

	function print_pagination($page_no, $total_no_of_pages, $direction, $order){
		$direction = switch_order_direction($direction);
		$order = switch_order_variable($order);
		$adjacents = "2";
		$second_last = $total_no_of_pages - 1;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		echo '<p><strong>Page ' . $page_no . ' of ' . $total_no_of_pages . '</strong> </p>';
		echo '<ul class="pagination">';
		if ($page_no > 1) {
			echo "<li><a href='?page_no=1&ord=" . $order . "&dir=" . $direction . "'>First Page</a></li>";
		}
		echo '<li ';
		if ($page_no <= 1){ 
			echo "class='disabled'";
		}
		echo '>';
		echo '<a ';
		if ($page_no > 1){
			echo "href='?page_no=$previous_page&ord=" . $order . "&dir=" . $direction . "'";
		} 
		echo '>Previous</a>';
		echo '</li>';
		if ($total_no_of_pages <= 10){   
			for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
				if ($counter == $page_no) {
					echo "<li class='active'><a>$counter</a></li>"; 
			    } else {
			    	echo "<li><a href='?page_no=$counter&ord=" . $order . "&dir=" . $direction . "'>$counter</a></li>";
			    }
			}
		} elseif ($total_no_of_pages > 10){
			if($page_no <= 4) { 
				for ($counter = 1; $counter < 8; $counter++){ 
					if ($counter == $page_no) {
				    	echo "<li class='active'><a>$counter</a></li>"; 
					} else{
				        echo "<li><a href='?page_no=$counter&ord=" . $order . "&dir=" . $direction . "'>$counter</a></li>";
				    }
				}
				echo "<li><a>...</a></li>";
				echo "<li><a href='?page_no=$second_last&ord=" . $order . "&dir=" . $direction . "'>$second_last</a></li>";
				echo "<li><a href='?page_no=$total_no_of_pages&ord=" . $order . "&dir=" . $direction . "'>$total_no_of_pages</a></li>";
			} elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) { 
				echo "<li><a href='?page_no=1&ord=" . $order . "&dir=" . $direction . "'>1</a></li>";
				echo "<li><a href='?page_no=2&ord=" . $order . "&dir=" . $direction . "'>2</a></li>";
				echo "<li><a>...</a></li>";
				for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) { 
				    if ($counter == $page_no) {
					 	echo "<li class='active'><a>$counter</a></li>"; 
					} else{
					    echo "<li><a href='?page_no=$counter&ord=" . $order . "&dir=" . $direction . "'>$counter</a></li>";
					}                  
				}
				echo "<li><a>...</a></li>";
				echo "<li><a href='?page_no=$second_last&ord=" . $order . "&dir=" . $direction . "'>$second_last</a></li>";
				echo "<li><a href='?page_no=$total_no_of_pages&ord=" . $order . "&dir=" . $direction . "'>$total_no_of_pages</a></li>";
			} else {
				echo "<li><a href='?page_no=1'>1</a></li>";
				echo "<li><a href='?page_no=2'>2</a></li>";
				echo "<li><a>...</a></li>";
				for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++){
				    if ($counter == $page_no) {
						echo "<li class='active'><a>$counter</a></li>";	
					} else{
				        echo "<li><a href='?page_no=$counter&ord=" . $order . "&dir=" . $direction . "'>$counter</a></li>";
					}                   
				}
			}
		}
		echo '<li '; 
		if ($page_no >= $total_no_of_pages){
			echo "class='disabled'";
		} 
		echo '>';
		echo '<a ';
		if ($page_no < $total_no_of_pages) {
			echo "href='?page_no=$next_page&ord=" . $order . "&dir=" . $direction . "'";
		} 
		echo '>Next</a>';
		echo '</li>';			 
		if ($page_no < $total_no_of_pages){
			echo "<li><a href='?page_no=$total_no_of_pages&ord=" . $order . "&dir=" . $direction . "'>Last &rsaquo;&rsaquo;</a></li>";
		}
		echo '</ul>';
	}

	function return_read_query($order, $direction, $limit, $offset){
		if (isset($_POST['search']) ) {
			if( !empty($_POST['search_string'])){																											//LIKE "%%";
				$read_query = "SELECT companies.company_id as company_id, companies.company_name as company_name, company_categories.category_name as category_name 
					FROM companies 
					LEFT JOIN company_categories ON companies.company_categories = company_categories.category_id 
					WHERE companies.date_deleted IS NULL 
					AND (company_name LIKE '%" . $_POST['search_string'] . "%' OR category_name='%" . $_POST['search_string'] . "%') 
					GROUP BY companies.company_name 
					ORDER BY " . $order . " " . $direction . " LIMIT " . $limit . " OFFSET " . $offset;		
			}
		} else {	

			$read_query = "SELECT companies.company_id as company_id, companies.company_name as company_name, company_categories.category_name as category_name 
				FROM companies 
				LEFT JOIN company_categories ON companies.company_categories = company_categories.category_id 
				WHERE companies.date_deleted IS NULL 
				GROUP BY companies.company_name 
				ORDER BY " . $order . " " . $direction . " LIMIT " . $limit . " OFFSET " . $offset;			
		}
		return $read_query;
	}

	 function return_database_count($conn){
		$sql = "SELECT COUNT(company_id) as database_count FROM companies WHERE date_deleted IS NULL";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				return 	$row['database_count'];			
			}
		} else {
			echo '<h3 class="text-center text-secondary">Error: ' . mysqli_error($conn) . '</h3>';			
		}
	}

?>