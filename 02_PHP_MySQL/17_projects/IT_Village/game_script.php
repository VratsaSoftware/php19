<?php
// Start the session
session_name("IT_Village");
session_start();
//Include the functions
include ("functions/functions.php");

// Set the variables
$player_color = $_SESSION['player_color'];
$colors = [];
$possitions = [];
$colors = $_SESSION['colors'];
$possitions = $_SESSION['possitions'];

// Check if user row the dice
if(!empty($_POST['dice_row'])){
	unset($_POST['dice_row']);
	$_SESSION['moves']--;
	dice_execude_moves($colors);
	;
	possition_actions($colors, $possitions, $_SESSION['moves'], $_SESSION['money'], $_SESSION['message'], $_SESSION['property_buy'], $_SESSION['score']);
	game_end($_SESSION['money'], $_SESSION['property_buy'], $_SESSION['moves']);
	header("Location: game.php");
}
else{
	header("Location: game.php");
}