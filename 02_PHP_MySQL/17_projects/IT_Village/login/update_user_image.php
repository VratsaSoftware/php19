<?php 
include '../includes/header.php';
include '../includes/db_connect.php';

if (!isset($_SESSION['loggedin'])) {
	header("Location: profile.php");
}
?>
<div class="container">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
	<a class="navbar-brand" href="profile.php">
	<img id="img" src="../img/picture_background.jpg" alt="logo" style="width: 350px;"><p>Home</p></a>
		<div class="container">
		<h4 class="text-warning">Change your photo</h4>
			<form action="upload_image.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="user_image" class="form-control" style="width: 250px !important;">
				</div>
				<input class="btn btn-primary" id="registration_form" type="submit" name="update_image" value="Update your profile image">
			</form>
		</div>
	</nav>
</div>
<?php
include '../includes/footer.php';
?>
