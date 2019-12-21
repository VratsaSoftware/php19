<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>forms</title>
</head>
<body>
	<form action="" method="post">
		<p>
			<label for="username">
				Username: <input id="username" type="text" name="username" value="" placeholder="Username here ...">
			</label>
		</p>
		<p>
			<label for="password">
				Password: <input type="password" id="password" name="password" value="">
			</label>
		</p>
		<p>
			<label for="age">
				Age: <input type="number" name="age" id="age">
			</label>
		</p>
		<p>Favorite Band</p>
		choose/more than one/
		<label for="queen">
			Queen <input type="checkbox" id="queen" name="queen">
		</label>
		<label for="u2">
			U2 <input type="checkbox" id="u2" name="u2">
		</label>
		<label for="aerosmith">
			Aerosmith <input type="checkbox" id="aerosmith" name="aerosmith">
		</label>
		<label for="metallica">
			Metallica <input type="checkbox" id="metallica" name="metallica">
		</label>
		<p>Do you agree</p>
		<label for="yes">Yes: <input type="radio" id="yes" name="agree" value="yes"></label>
		<label for="no">No: <input type="radio" id="no" name="agree" value="no"></label>
		<p>Select user type</p>
		<p>
			<select name="user_type">
				<option value="student">Student</option>
				<option value="teacher">Teacher</option>
			</select>
		</p>
		<label for="message">
			<textarea id="message" name="message"></textarea>
		</label>
		<p><input type="submit" name="" value="Register"></p>
	</form>
</body>
</html>