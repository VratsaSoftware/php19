<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="task01.php" method="post">
		Въведи възраст: <input type="text" name="age">
		<input type="submit" name="submit" value="Избери">
	</form>
</body>
</html>


<?php

$age = $_POST['age'];

if ($_POST['age'] <18){
	echo 
	"<ul>"
	. "<li>" . "Limonada" . "</li>"
	. "<li>" . "Coca Cola" . "</li>"
	. "<li>" . "Milk". "</li>" 
	. "</ul>";
}	

if ($_POST['age'] >18) {
	echo 
	"<ul>"
	. "<li>" . "Vodka" . "</li>"
	. "<li>"  . "Brendy". "</li>"
	. "<li>" . "Rom" . "</li>" 
	. "</ul>";	
}
else{
	echo "Наздраве!";
}
?>