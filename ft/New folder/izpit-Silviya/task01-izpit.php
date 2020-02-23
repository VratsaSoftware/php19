<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		Възраст:
		<input type="text" name="age">
		<input type="submit" name="submit" value="submit">


		
	</form>
</body>
</html>
<?php
//pole svyzrast
//menu s alkohl i menu s bezalk nap-nenomer spisyk
//forma php kod v edin fail
if ($_POST['age']<18) {
	echo '<ul>';
	echo '<li>'."kola".'</li>';
	echo '<li>'."sprite".'</li>';
	echo '<li>'."fanta".'</li>';
	echo '</ul>';
}
else if ($_POST['age']>=18) {
	echo '<ul>';
	echo '<li>'."vodka".'</li>';
	echo '<li>'."gin".'</li>';
	echo '<li>'."rom".'</li>';
	echo '</ul>';
}



?>