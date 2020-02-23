<!DOCTYPE html>
<html>
<head>
	<title>Задача 1</title>
</head>
<body>
	<?php
		if(isset($_POST['submit'])){
			echo 'За днешния ден е добре да си приготвите следния гардероб: ';
			if ($_POST['date'] % 2 == 0){
				echo '<ul><li>Чадър</li><li>Яке</li><li>Пуловер</li><li>Непромокаем панталон</li><li>Непромокаеми обувки</li><li>Резервни чорапи</li></ul>';
			} else{
				echo '<ul><li>Шапка с козирка</li><li>Тениска</li><li>Къси панталони</li><li>Леки обувки</li><li>Добро настроение</li></ul>';
			}
		}

		echo '<p><a href="..\index.php">Обратно</a>';
	?>
</body>
</html>