<?php
include ('includes/header.php');
include ('includes/db_connect.php');

if ($_SESSION["loggedin"] != true) {
	header("Location: login/login.php");
}
// Check if moves is not set
if (!isset($_SESSION['moves'])) {
	header ("Location: functions/game_start.php");
}
//Check if  player color is not set
if (!isset($_SESSION['player_color'])) {
	header ("Location: functions/game_start.php");
}
//Game variables

$player_color = $_SESSION['player_color'];
$colors = [];
$possitions = [];
$colors = $_SESSION['colors'];
$possitions = $_SESSION['possitions'];

if ($_SESSION['score'] == "win" || $_SESSION['score'] == "loss") {
	echo '<style>#dice{display: none;} #game_stats{display: none;} #dice_image{display: none;}</style>';
	unset($_SESSION['player_color']);
	?>
	<table id="game_end_table" style="background: #fff" class="table table-striped">
		<thead>
			<tr>
				<th>Money</th>
				<th>Game end reason</th>
				<th>Motels bought</th>
				<th>Count all motels</th>
				<th>Win / Loss</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?= $_SESSION['money']?></td>
				<td><?= $_SESSION['game_end_message']?></td>
				<td><?= count($_SESSION['property_buy'])?> psc.</td>
				<td>3 psc.</td>
				<td>
				<?php
				if ($_SESSION['score'] == "win") {
					echo "<span style='color: #0f0; font-weight: bold; '>Win</span>";
				}else{
					echo "<span style='color: #f00; font-weight: bold; '>Loss</span>";
				}
				?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
	//Check if user win or loss and add the query needed
	if ($_SESSION['score'] == "win") {
		$query = "SELECT `wins` FROM `results` WHERE `user_id` = '".$_SESSION['user_id']."' LIMIT 1";
		$game_end = "wins";
	}
	else{
		$query = "SELECT `losses` FROM `results` WHERE `user_id` = '".$_SESSION['user_id']."' LIMIT 1";
		$game_end = "losses";
	}

	$result = mysqli_query($conn, $query);

	$db_score_arr = mysqli_fetch_assoc($result);
	// var_dump($db_score_arr);
	$db_score = $db_score_arr[$game_end];
	$db_score++;

	if ($_SESSION['score'] == "win") {
		$query = "UPDATE `results` SET `wins` = '".$db_score."' WHERE `user_id` = '".$_SESSION['user_id']."'";
	}
	else{
		$query = "UPDATE `results` SET `losses` = '".$db_score."' WHERE `user_id` = '".$_SESSION['user_id']."'";
	}
	$result = mysqli_query($conn, $query);
	?>
	<a href="login/profile.php" class="btn btn-primary" id="login">Go back to profile</a>
	<a href="functions/game_start.php" class="btn btn-primary" id="registration_form">Play again</a>
	<?php

}
include ("functions/functions.php");

?>
	<div class="container">
		<div class="col-4 offset-4">

			<svg width="200" height="200">
				<rect  x="0" y="0" width="50" height="50" style="fill: <?= $colors[0] ?>; stroke: black"></rect>
				<text x="15" y="37.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[0] ?></text>
				<!-- New Block -->
				<rect x="50" y="0" width="50" height="50" style="fill: <?= $colors[1] ?>; stroke: black"></rect>
				<text x="65" y="37.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[1] ?></text>
				<!-- New Block -->
				<rect x="100" y="0" width="50" height="50" style="fill: <?= $colors[2] ?>; stroke: black"></rect>
				<text x="115" y="37.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[2] ?></text>
				<!-- New Block -->
				<rect x="150" y="0" width="50" height="50" style="fill: <?= $colors[3] ?>; stroke: black"></rect>
				<text x="165" y="37.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[3] ?></text>
				<!-- New Block -->
				<rect x="150" y="50" width="50" height="50" style="fill: <?= $colors[4] ?>; stroke: black"></rect>
				<text x="165" y="87.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[4] ?></text>
				<!-- New Block -->
				<rect x="150" y="100" width="50" height="50" style="fill: <?= $colors[5] ?>; stroke: black"></rect>
				<text x="165" y="137.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[5] ?></text>
				<!-- New Block -->
				<rect x="150" y="150" width="50" height="50" style="fill: <?= $colors[6] ?>; stroke: black"></rect>
				<text x="165" y="187.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[6] ?></text>
				<!-- New Block -->
				<rect x="100" y="150" width="50" height="50" style="fill: <?= $colors[7] ?>; stroke: black"></rect>
				<text x="115" y="187.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[7] ?></text>
				<!-- New Block -->
				<rect x="50" y="150" width="50" height="50" style="fill: <?= $colors[8] ?>; stroke: black"></rect>
				<text x="65" y="187.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[8] ?></text>
				<!-- New Block -->
				<rect x="0" y="150" width="50" height="50" style="fill: <?= $colors[9] ?>; stroke: black"></rect>
				<text x="15" y="187.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[9] ?></text>
				<!-- New Block -->
				<rect x="0" y="100" width="50" height="50" style="fill: <?= $colors[10] ?>; stroke: black"></rect>
				<text x="15" y="137.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[10] ?></text>
				<!-- New Block -->
				<rect x="0" y="50" width="50" height="50" style="fill: <?= $colors[11]?>; stroke: black"></rect>
				<text x="15" y="87.5" font-family="Verdana" font-size="35" fill="#878d94"><?= $possitions[11] ?></text>
			</svg>
		</div>
	</div>
	<div class="container">	
		<form action="game_script.php" method="post" id="dice">
			<input class="btn btn-success" id="login" type="submit" name="dice_row" value="Хвърли зар">
		</form>
		<div class="row">
			<div id="dice_image" class="col-md-4 offset-md-4">
				<?php if (isset($_SESSION['dice'])) { ?>
				<p class="text-white">Your dice is:   <img style="width: 50px; height: 50px;" src="img/dice_<?=$_SESSION['dice']?>.jpg" alt="<?=$_SESSION['dice']?>"></p>
				<?php } ?>
			</div>

			<div id="game_stats" class="col-md-4 offset-md-8">
				<p class="text-white">Game message:</p>
				<p class="alert alert-info"><?= $_SESSION['message'] ?></p>
				<p class="text-white">You have only <b><?= $_SESSION['moves'] ?></b> more. </p>
				<p class="text-white">Your money:  <b><?= $_SESSION['money'] ?></b></p>
				<p class="text-white">Property buy: <b><?php echo count($_SESSION['property_buy']) ?></b></p>
			</div>
		</div>
	</div>
<?php
include ('includes/footer.php');
