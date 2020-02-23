<!DOCTYPE html>
<html>
<head>
	<title>Задача 3</title>
</head>
<body>
	<form method="post">
		Редове <input type="number" name="rows" min="1">
		Колони <input type="number" name="cols" min="1">
		<input type="submit" name="submit" value="Генерирай">
	</form>
	<?php
		if(isset($_POST['submit'])){
			$array = [];
		$start_num = 1;		
		for ($rows=0; $rows < $_POST['rows']; $rows++) { 
			$num = $start_num;
			for ($cols=0; $cols < $_POST['cols']; $cols++) { 
				$array[$rows][$cols] = $num;
				$num += 15;
			}
			$start_num += 3;
		}
		echo '<table border="1">';
		for ($rows=0; $rows < $_POST['rows']; $rows++) { 
			echo '<tr>';
			for ($cols=0; $cols < $_POST['cols']; $cols++) { 
				echo '<td>' . $array[$rows][$cols] . '</td>';				
			}
			echo '</tr>';
		}
		echo '</table>';
		}
		
		echo '<p><a href="..\index.php">Обратно</a>';
	?>
</body>
</html>