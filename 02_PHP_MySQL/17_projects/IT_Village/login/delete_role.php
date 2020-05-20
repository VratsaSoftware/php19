<?php 

include '../includes/header.php';
include '../includes/db_connect.php';

if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
if ($_SESSION['role'] != 'admin') {
	header("Location: profile.php");
}
//Select names of the roles
$query = "SELECT `role_name` FROM `roles` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $query);
// Count the users which have a role
while ($row = mysqli_fetch_assoc($result)) {
    $count_query = "SELECT COUNT(u.`user_id`) AS `".$row['role_name']."_role_counted`  FROM `users` u JOIN `roles` r ON u.`role_id` = r.`role_id` WHERE `role_name` = '".$row['role_name']."'";

	$count_result = mysqli_query($conn, $count_query);

	while ($row_inner = mysqli_fetch_assoc($count_result)) {
	    $count_roles[$row['role_name']] = $row_inner[$row['role_name'] . '_role_counted'];
	}
}

//Select all other information about roles
$query = "SELECT `role_id`, `role_name`, `role_description` FROM `roles` WHERE `date_deleted` IS NULL";

$result = mysqli_query($conn, $query);
?>
<a href="roles.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>   Go back to roles</a>

<p></p>
<?php 	if (isset($_SESSION['user_error'])) { ?>
<p class="alert alert-danger">
	<?php 
		echo $_SESSION['user_error'];
		unset($_SESSION['user_error']);
	?>
</p>
<?php } ?>
<?php if(isset($_SESSION['role_delete_successful'])){ ?>
<p class="alert alert-success">
	<?php 
		echo $_SESSION['role_delete_successful'];
		unset($_SESSION['role_delete_successful']);
	?>
</p>
<?php } ?>
<table class='table table-striped' style="color: #fff">
	<tr>
		<td>#</td>
		<td>Role</td>
		<td>Role description</td>
		<td>#</td>
		<td>#</td>
	</tr>
<?php
$num = 1;
while ($row = mysqli_fetch_assoc($result)) {
    ?>
	<tr>
		<td><?= $num ?></td>
		<td><?= $row['role_name']?></td>
		<td><?= $row['role_description']?></td>
		<td>
			<?php 
				if ($count_roles[$row['role_name']] != NULL){
					$roles_sum[$num] =  $count_roles[$row['role_name']];
					echo $roles_sum[$num];
				} 
				else{
					echo '0';
				}
			?>
		</td>
		<td>
			<?php 
			if ($row['role_name'] == "admin" || $row['role_name'] == "user") {
				echo 'You may not delete this role';
			}else{
			?>
			<form action="delete_role_script.php" method="post">
				<input class="btn btn-outline-danger" type="submit" name="submit" value="Delete role">
				<input type="hidden" name="role_id" value="<?= $row['role_id'] ?>">
			</form>
		<?php } ?>
		</td>
	</tr>
    <?php
    $num++;
}
?>
</table>

<?php

include '../includes/footer.php';