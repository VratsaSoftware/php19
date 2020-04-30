<?php 
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>DELETE</title>
</head>
<body>
	Are you sure you want to delete company <?php echo $_GET['name'];?> from the records?
	<p>		
	<form method="post"> 
		<input type="submit" name="confirm" value="Confirm" class="btn btn-primary btn-lg">
		<input type="submit" name="cancel" value="Cancel" class="btn btn-primary btn-lg">
	</form>
	<?php 
			if (isset($_POST['cancel'])){
				header("Location: index.php");
				exit;
			}
			if (isset($_POST['confirm'])){
				$sql = "UPDATE companies SET date_deleted = '" . date("Y-m-d H:i:s") . "' WHERE company_id = " . $_GET['id'];
				$result = mysqli_query($conn, $sql);
				if ($result) {
					header("Location: index.php");
					exit;
				} else {
					echo '<h3 class="text-center text-secondary">Something went wrong with deletion. Try again!</h3>';
				}
			}

		?>
</body>
</html>