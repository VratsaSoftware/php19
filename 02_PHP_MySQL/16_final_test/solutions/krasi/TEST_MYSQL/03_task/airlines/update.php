<?php 
include '../includes/header.php';

include '../includes/db_connect.php';
$id = $_GET['id'];

$read_query = "SELECT * FROM ".$table_name." WHERE airline_id=".$id;

$result = mysqli_query($conn, $read_query);
if( $result ){
	$row = mysqli_fetch_assoc($result);

}
echo '
<form method="post" action="">';
	echo '<p></p><p>Update airline</p>
	<input type="text" name="airline_name" value="'.$row['airline_name'].'">
	<input type="text" name="CEO" value="'.$row['CEO'].'">
	<input type="hidden" name="id" value="'. $row['airline_id'].'">
	<select name="country_name">
		<option value="NULL"> -- select country -- </option>';
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
	</select>';

	echo '<input type="submit" name="submit" value="save">	
</form>';


if (isset($_POST['airline_name']))
	{	
		$id=$_POST['id'];
		$data = $_POST['airline_name'];	

		$CEO = $_POST['CEO'];	
		$country_id = intval($_POST['country_name']);


$check_query = "SELECT * FROM countries WHERE country_id=$country_id";

$check_result = mysqli_query($conn, $check_query);
//var_dump($check_result);
if( mysqli_num_rows($check_result) > 0 ){

//UPDATE `destinations` SET `destination_name` = 'Belekni', `country_id` = '2' WHERE `destinations`.`destination_id` = 4;

	$update_query = "UPDATE `airlines` SET `airline_name`='". $data ."',CEO='".$CEO."', country_id=".$country_id." WHERE `airline_id`=".$id;

	 var_dump($update_query);
	$update_res = mysqli_query($conn, $update_query);

}

	if( !$update_res )
		{
		echo 'Update failed!' . mysqli_error($conn);
		}
	else 
		{
		header("Location: index_airlines.php");
		echo $data." Updated successfully!";
		}
	}

include '../includes/footer.php';
?>