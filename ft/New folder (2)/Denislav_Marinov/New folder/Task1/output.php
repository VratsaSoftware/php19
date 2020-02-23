<!DOCTYPE html>
<html>
<head>
	<title>Task 1 Output</title>
</head>
<body>
<?php 

if(empty($_POST['date'])){
	echo "Въведете валидни данни!!!<p></p>";
	echo "<a href='index.php'>Назад</a>";
}
elseif($_POST['date'] > 30 || $_POST['date'] < 1){
	echo "Въведете валидна дата!!! <p></p>";
	echo "<a href='index.php'>Назад</a>";
}
else{
	$date = $_POST['date'];

	if($date % 2 == 0){
		?>
		<p>Датата е <?= $date ?>. Тя е четна. Днес ще вали. Препоръчително облекло:</p>
		<ul>
			<li>Дъждобран или яке с качулка</li>
			<li>Кожени обувки</li>
			<li>Дънки</li>
		</ul>
		<a href="index.php">Назад</a>
		<?php
	}
	else{
		?>
		<p>Датата е <?= $date ?>. Тя не е четно число. Днес ще е много топло. Препоръчително облекло:</p>
		<ul>
			<li>Платнени обувки или сандали</li>
			<li>Тениска</li>
			<li>Къси панталони</li>
		</ul>
		<a href="index.php">Назад</a>
		<?php
	}
}
?>
</body>
</html>