<?php
function dice_execude_moves($colors){
	$dice = rand(1, 6); 
	$_SESSION['dice'] = $dice;
		for ($j = 0; $j < 12; $j++) {
		if ($colors[$j] != "#fff") {

			$player_color = $colors[$j];

			$colors[$j] = "#fff";
			if ($dice+$j <  12) {

				$possittion_in_array = $j + $dice;
		
				$colors[$possittion_in_array] = $player_color;
				$_SESSION['colors'] = $colors;
				break;
			}
			elseif ($dice+$j >= 12){
		
				$step1 = 12 - $j;

				$step2 = $dice - $step1;
		
				$possittion_in_array = $step2;
				
				$colors[$possittion_in_array] = $player_color;
				$_SESSION['colors'] = $colors;
				break;
			}
		}
	}
	return $_SESSION['colors'];
}

function possition_actions($colors, $possitions, $moves, $money, $message, $property_buy, $score){
	for ($k = 0; $k < 12; $k++){
		if($colors[$k] != "#fff"){
			$current_possition = $k;
		}
	}
	$action_name = $possitions[$current_possition];
	switch ($action_name) {
		case "P":
		$money -= 5;
		$message = "You should buy Cloud Cocktail! You lost 5 coins!";
		break;
		
		case "I":
			if (!isset($property_buy[$current_possition]) && $money > 100) {
				$money -= 100; 
				$message = "You bought Wi-Fi Motel! Congratulations!";
				$property_buy[$current_possition] = true;
			}
			elseif ($property_buy == true) {
				$money += 20;
				$message = "You had a happy client in your Motel! You won 20 coins!";
			}
			elseif ($money <= 100) {
				$money -=  10;
				$message = "You sleep a 5 stars hotel! You lost 10 coins!";
			}
		break;

		case "F":
		$money += 20;
		$message = "Congratulations! Successful Freelance project! You won 20 coins";
		break;

		case "S":
		$moves -= 2;
		$message = "Sorry! Your Wi-Fi ruled out surprisingly! You lost 2 moves untill your Wi-Fi got back!";
		break;

		case "V":
		$money = $money * 10;
		$message = "You multiply your funds!!!";
		break;

		case "N":
		$score = "win";
		$message = "You won the game with the help of VSC";
		$_SESSION['game_end_message'] = "You won the game with the help of VSC";
		break;
	}
	$_SESSION['moves'] = $moves;
	$_SESSION['money'] = $money;
	$_SESSION['message'] = $message;
	$_SESSION['property_buy'] = $property_buy;
	$_SESSION['score'] = $score;

}

function game_end($money, $property_buy, $moves){
	if ($money <= 0) {
		$_SESSION['game_end_message'] = "Your money had expired!!!";
		$_SESSION['score'] = "loss";
	}
	elseif (count($property_buy) == 3) {
		$_SESSION['game_end_message'] = "You bought all properties";
		$_SESSION['score'] = "win";
	}
	elseif ($moves <= 0) {
		$_SESSION['game_end_message'] = "No more moves!!!";
		$_SESSION['score'] = "loss";
	}
}