<?php

include 'includes/header.php';


$read_query = "SELECT c.`company_id`, c.`company_name`, cc.`category_name` FROM `companies`c JOIN `company_categories` cc ON c.`company_categories` = cc.`category_id` WHERE c.`date_deleted` IS NOT NULL";

$result = mysqli_query($conn, $read_query);

?>
<h2>Recycle Bin</h2>
	<table class="table table-striped">		
		<tr>
			<td>#</td>
			<td>Company</td>
			<td>Category</td>
			<td>Permanent Delete</td>
			<td>Restore</td>
		</tr>
		<?php 
		$num = 1;
		while( $row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?= $num++ ?></td>
				<td><?= $row['company_name']?></td>
				<td><?= $row['category_name']?></td>
				<td><a class="btn btn-info" href="delete.php?id=<?= $row['company_id']?>">Permanent Delete</a></td>
				<td><a class="btn btn-info" href="restore.php?id=<?= $row['company_id']?>">Restore</a></td>
			</tr>
			<?php
		}

		?>
	</table>

<?php

include 'includes/footer.php';