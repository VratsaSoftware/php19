<?php 
include ('../includes/header.php');
if ($_SESSION["loggedin"] != true) {
	header("Location: ../login/login.php");
}
$player_color = "#fff";
?>
<div class="container">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
	<a class="navbar-brand" href="../login/profile.php">
	<img id="img" src="../img/picture_background.jpg" alt="logo" style="width: 350px;"></a>
		<div class="container">
		<h4 class="text-warning">ST@RT pl@ying @ g@me</h4>
			<form action="#" method="post" class="">
				<div class="form-group">
					<label for="moves" class="text-warning">How much moves will you have?</label>
					<input id="moves" type="number" name="moves" min="1" max="50" required>
				</div>
				<div class="form-group">
					<label for="player_color" class="text-warning">Select your color</label>
					<select id="player_color" name="player_color" required>
						<option value="red">Red</option>
						<option value="blue">Blue</option>
						<option value="yellow">Yellow</option>
						<option value="green">Green</option>
						<option value="gray">Gray</option>
						<option value="orange">Orange</option>
						<option value="purple">Purple</option>
						<option value="brown">Brown</option>
						<option value="pink">Pink</option>
					</select>
				</div>
				<input class="btn btn-primary" id="registration_form" type="submit" name="submit" value="Start game">
			</form>
		</div>
	</nav>
</div>
<?php
	if (isset($_POST['submit'])) {
		if(!is_string($_POST['player_color']) && !is_int($_POST['moves'])){
			$error = "Please fill all fields";
		}
		else{
			$moves = filter_var($_POST['moves'], FILTER_SANITIZE_NUMBER_INT);
			$player_color = htmlspecialchars($_POST['player_color']);
			if (empty($moves)) {
				header("Location: game_start.php");
			}

			$_SESSION['player_color'] = $player_color;
			$_SESSION['moves'] = $moves;
			$_SESSION['money'] = 50;
			$_SESSION['message'] = "";
			$_SESSION['property_buy'] = [];
			$_SESSION['score'] = "";
			$_SESSION['dice'] = NULL;
			$_SESSION['game_end_message'] = "";
			include ('game_table_refresh.php');
		}
		if (!empty($_SESSION['player_color'])) {
			header("Location: ../game.php");
		}
	}

	include '../includes/footer.php';
