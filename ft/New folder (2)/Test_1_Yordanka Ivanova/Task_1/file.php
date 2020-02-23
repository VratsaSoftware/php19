<?php

if (isset($_POST)) {
	$date=$_POST['date'];
	if ($date==0 || $date>30) {
		echo "Моля въведете коректна дата";
		# code...
	}else{
		if ($date%2==0) {
		echo "препоръчително е облекло за дъждовно време";
		echo "<ul>";
		echo"<li> чадър </li>";
		echo'<li> яке </li>';
		echo'<li> затворени обувки </li>';
		echo "</ul>";

		# code...
	}else {
		echo "препоръчително е облекло и екипировка за много горещо време.";
	echo "<ul>";
		echo'<li> къси панталони </li>';
		echo'<li> сандали </li>';
		echo'<li> слънчеви очила</li>';
		echo "</ul>";
		# code...
	}
}
}
	


	# code...
