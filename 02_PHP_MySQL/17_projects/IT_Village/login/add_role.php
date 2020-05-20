<?php 

include '../includes/header.php';
include '../includes/db_connect.php';
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
if ($_SESSION['role'] != 'admin') {
	header("Location: profile.php");
}

?>
<a href="profile.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>   Go back to your profile</a><p></p>
<form class="form-group" action="add_role_script.php" method="post">
	<label for="role_name" class="text-light">Role name:</label>
	<input type="text" name="role_name" placeholder="admin" class="form-control" id="role_name">
	<p></p>
	<span class="text-light">Role description:</span>
	<textarea name="role_description" id="" cols="30" rows="5" class="form-control"></textarea>
	<p></p>
	<input type="submit" name="submit" value="Add role" class="btn btn-outline-info">
</form>

<?php 
$_SESSION['add_role_key'] = rand();
include '../includes/footer.php';