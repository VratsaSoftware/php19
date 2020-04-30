<?php 
include 'includes/header.php';

$company_id = $_GET['id'];

$query = "SELECT  `company_name` FROM `companies` WHERE `company_id` = '".$company_id."'";

$result = mysqli_query($conn, $query);

$company_name = mysqli_fetch_assoc($result);

$query = "SELECT `category_id`, `category_name` FROM `company_categories` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $query);
?>
<form action="update_script.php" method="post" class="form-inline">
	    <p>Firm name:</p>
	    <input class="form-control" type="text" name="company_name" value="<?= $company_name['company_name'] ?>">
		<input type="hidden" name="company_id" value="<?= $company_id?>">
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
	<input type="submit" name="submit" value="Update firm" class="btn btn-success">
</form>
<?php
include 'includes/footer.php';