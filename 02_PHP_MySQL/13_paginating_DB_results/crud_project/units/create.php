<?php 
include '../includes/db_connect.php';
$title = 'create units';

include '../includes/header_inner.php';
?>

<form method="post" action="">
	<p>Enter unit name</p>
	<input type="text" name="unit_name">
	<input type="submit" name="submit" value="save">	
</form>
<?php 
var_dump($_POST['unit_name']);
//1 

if( isset($_POST['unit_name'])){
	$unit_name = $_POST['unit_name'];

//2 insert_query
$insert_query = "INSERT INTO `units`(`unit_name`) VALUES ('$unit_name')";
//3
$result = mysqli_query($conn, $insert_query);

var_dump($result);
if($result){
	echo "Record created successfuly";
} else {
	die('Query failed!' . mysqli_error($conn));
}


}
include '../includes/footer.php'
?>