<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Registration form</title>
		<style>
			h2 {
				font-family: Barbarjowe Pisanki; 
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
		<p>First name: <input type="text" placeholder="Your First name here" name="First name"></p>
		<p>Last name: <input type="text" placeholder="Your Last name here" name="Last name"></p>
		<p>Family: <input type="text" placeholder="Your Family here" name="Family"></p>
		<p>ERN:	<input type="text" placeholder="Your ERN here" name="ERN"></p>
		<p>Address:	<input type="text" placeholder="Your Address here" name="Address"></p>
		<p>Education: <input type="text" placeholder="Your Education here" name="Education"></p>
		<p>Profession: <input type="text" placeholder="Your Profession here" name="Profession"></p>
		<br>
		<input type="submit" name="submit" value="Send"></div>
		</form>
	</body>
</html>
 