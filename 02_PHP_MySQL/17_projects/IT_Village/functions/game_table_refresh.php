<?php 

$colors = [
	"$player_color","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff",
];
shuffle($colors);

$possitions = [
	"P", "I", "F", "S", "F", "V", "I", "F", "F", "I", "N", "P"
];
shuffle($possitions);

$_SESSION['colors'] = $colors;
$_SESSION['possitions'] = $possitions;