<?php 
include '../includes/header.php';
$read_query = "SELECT * FROM `airlines` JOIN countries ON airlines.country_id=countries.country_id WHERE airlines.date_deleted is NULL ";

$result = mysqli_query($conn, $read_query);
//var_dump($result);
if( $result )
{
	$row = mysqli_fetch_assoc($result);
}
//var_dump($row);
//die;

?>

<form method="post" action="">
	<?php
			echo '<p>Enter new airline </p>
			<input type="text" name="airline_name">
			<select name="country">
			<option> -- select country -- </option>';
				$countries_query = "SELECT * FROM countries";
				$countries_result = mysqli_query($conn, $countries_query); 
				if( mysqli_num_rows($countries_result) > 0 )
				{
					while($country_row = mysqli_fetch_assoc($countries_result))
					{
					echo '			
			<option value="'. $country_row['country_id'].'"';
				if( $country_row['country_id'] == $row['country_id'])
					{ echo 'selected=true'; }
				echo '>'.$country_row['country_name'].'</option>';
			} 
		}		
		echo '
	</select>
			<input type="submit" name="submit" value="save">	
		</form>';
		

//var_dump($_POST['country']);
//1 
	if (isset($_POST['airline_name']))
	{		
		$data = $_POST['airline_name'];
		if (isset($_POST['country']))
			{$country_id= $_POST['country'];}
			//var_dump($country_id);}
//2 insert_query
		$insert_query = "INSERT INTO `".$table_name."`(`airline_name`, country_id) VALUES ('$data','$country_id')";
//3		
		$result = mysqli_query($conn, $insert_query);

//var_dump($result);
	if($result)
		{
		echo 'Succesfully added '.$data;
		}
 	else 
		{
		die('Query failed!' . mysqli_error($conn));
		}
	}
echo '<p></p><p><a href="index_airlines.php" class="btn btn-warning">To base</a></p>';

include '../includes/footer.php';
?>