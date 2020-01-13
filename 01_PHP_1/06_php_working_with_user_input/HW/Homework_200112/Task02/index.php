<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Registration form</title>
		<style>
			h2 {
				font-family: Arial; 
				color: #a82006;
			}
			p {
				font-family: Arial;
				color: #251d8a;
			}
		</style>
	</head>
<body>
	<form action="info_registration.php" method="post">
		<div style="margin: 5% 5% 5% 5%;">
		<h2>Registration form</h2>
		<p>Първо име:<input type="text" placeholder="Your First name here" name="firstname"></p>
		<p>Второ име:<input type="text" placeholder="Your Last name here" name="lastname"></p>
		<p>Фамилия:<input type="text" placeholder="Your Family here" name="family"></p>
		<p>ЕГН:<input type="text" placeholder="Your ERN here" name="ern"></p>
		<p>Адрес:<input type="text" placeholder="Your Address here" name="address"></p>
		<p>Образование:<input type="text" placeholder="Your Education here" name="education"></p>
		<p>Професия:<input type="text" placeholder="Your Profession here" name="profession"></p>
		<br>
		<input type="submit" name="submit" value="Send"></div>
		</form>
	</body>
</html>
 