<!DOCTYPE html>
<html>
<head>
	<title>age1</title>
</head>
<body>
	<form action="#" method="post">
   		<input type="number" name="age1">
			<input type="submit" name="submit">
</body>
</html>
<?php 
if($_POST['age1'] < 18){
echo '<ul>
   	    	<li>Coca Cola</li>
   	    	<li>Sprite</li>
   	    	<li>Fanta</li>
   	    </ul>';
   	}else
   	echo '<ul>
   	    	<li>Whiskey</li>
   	    	<li>Vodka</li>
   	    	<li>Wine</li>
   	    </ul>';
   	{

   	}


 ?>