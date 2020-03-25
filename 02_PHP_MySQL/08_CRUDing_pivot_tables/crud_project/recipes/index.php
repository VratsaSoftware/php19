<?php 
include '../includes/header_inner.php';

//1 - need to display only recipe name
$read_query = "SELECT * FROM `recipes` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
?>
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>Recipes</td>
		<td>***</td>
		<td>soft delete</td>
		
	</tr>
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $num ++?></td>
			<!-- view recipe -->
			<td><a title="виж рецептата" href="view_recipe.php?id=<?= $row['recipe_id'] ?>"><?= $row['recipe_name'] ?></a></td>	
			<td><a href="update.php?id=<?= $row['recipe_id'] ?>" class="btn btn-warning">UPDATE</a></td>	
			<td><a href="soft_delete.php?id=<?= $row['recipe_id'] ?>">SOFT DELETE</a></td>	
		</tr>
		<?php
	}
?>
</table>

<a href="recycle_bin.php">Recycle Bin</a>
<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>

<?php 
include '../includes/footer.php'
?>