<?php  

$date = $_POST['Number'];

if ($date %2 == 0) {
	echo "Препоръчително е облекло за дъждовно време 
	<ul>
		<li>Яке </li>
		<li>Обувки</li>
		<li> Чедър </li>
	</ul>";
}
else{
	echo "Препоръчително е облекло и екипировка за много горещо време
	<ul>
		<li> Очила</li>
		<li> Шапка</li>
		<li> Джапанки</li>
	</ul>";
}