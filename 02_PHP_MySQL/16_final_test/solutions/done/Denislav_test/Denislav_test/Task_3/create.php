<?php

include 'includes/header.php';

$query = "SELECT `category_id`, `category_name` FROM `company_categories` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $query);
?>
<form action="create_script.php" method="post" class="form-inline">
	    <p>Firm name:</p>
	    <input class="form-control" type="text" name="company_name" placeholder="New firm name">
	    <p></p>
	    <p>Firm category:</p>
		<select class="form-control" name="company_category">
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
				?>
				<option value="<?= $row['category_id']?>"><?= $row['category_name'] ?></option>
				<?php
			}
			?>
	</select>
	<input type="submit" name="submit" value="Create firm" class="btn btn-success">
</form>

<?php
include 'includes/footer.php';