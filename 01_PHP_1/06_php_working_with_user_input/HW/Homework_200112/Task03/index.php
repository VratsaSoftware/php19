<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Week</title>
	<style>
		p {
			font-family: Calibri;
			color: #2908f6;
		}
	</style>
</head>
<body>
	<form action="" method="post">
		<p>Choose a day of the week</p>
		
				<select name="day">
			<option value="">   </option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Manday">Sunday</option>
		</select>
			<p> <input type="submit" name="" value="избери"></p>
	</form>
	<?php
	if (!empty($_POST)) {
		
	switch ($_POST['day']) {
		case 'Monday':
		echo('Laugh on Monday, laugh for danger');
		break;
		case 'Tuesday':
		echo('Laugh on Tuesday, kiss a stranger');
		break;
		case 'Wednesday':
		echo('Laugh on Wednesday, laugh for a letter');
		break;
		case 'Thursday':
		echo('Laugh on Thursday, something better');
		break;
		case 'Friday':
		echo('Laugh on Friday, laugh for sorrow');
		break;
		case 'Saturday':
		echo('Laugh on Saturday, joy tomorrow');
		break;
	}
}
		
	


	?>
</body>
</html>