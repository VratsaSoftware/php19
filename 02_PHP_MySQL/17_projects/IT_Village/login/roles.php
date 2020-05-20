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
<a href="profile.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>   Go back to your profile</a>
<a class="btn btn-outline-info" href="add_role.php">Add role</a>
<a class="btn btn-outline-danger" href="delete_role.php">Delete role</a>

<p></p>
<table class='table table-striped' style="color: #fff">
	<tr>
		<td>#</td>
		<td>Role</td>
		<td>Role description</td>
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
	</tr>
    <?php
    $num++;
}
?>
<tr>
	<td colspan="3">Sum of the users</td>
	<?php 
	$sum = 0;
	for ($i = 1; $i <= count($roles_sum); $i++) {
		$sum += $roles_sum[$i];
	}
	?>
	<td><?= $sum ?></td>
</tr>
</table>

<?php

include '../includes/footer.php';