<?php
include 'includes/header.php';

$read_query = "SELECT c.company_id,c.company_name, ct.category_name, ct.category_id FROM `companies` c JOIN company_categories ct ON c.`company_categories`= ct.`category_id` ";
var_dump($read_query);
$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
	?>
	<div class="container">
        <button><a href="create.php?" class="btn btn-success">ADD</a></button>

        <table class="table table-striped">
			<tr>
				<td>#</td>
				<td>Company name</td>
				<td>Category_name</td>
				<td>***</td>		
			</tr>
			<?php
			$num = 1;
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?= $num ++?></td>
					<!-- view recipe -->
					<td><a title="виж компанията" href="view_company.php?id=<?= $row['company_id'] ?>"><?= $row['company_name'] ?></a></td>
					<td><?= $row['category_name'] ?></td>
					<td><a href="update.php?id=<?= $row['company_id'] ?>" class="btn btn-warning">UPDATE</a></td>
                    <td><a href="delete.php?id=<?= $row['company_id'] ?>" class="btn btn-danger">DELETE</a></td>

                </tr>
				<?php
			}
			?>
		</table>
	</div>	
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>






<?php
include 'includes/footer.php';
?>
