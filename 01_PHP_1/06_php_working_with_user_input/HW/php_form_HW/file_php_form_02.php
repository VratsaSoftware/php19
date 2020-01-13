<?php
	if (!empty($_POST)) {
		if (!empty($_POST['name'])&&(!empty($_POST['egn'])&&(!empty($_POST['address'])&&(!empty($_POST['education'])&&(!empty($_POST['profession'])))))) {
		   $name=$_POST['name'];
	        $egn=$_POST['egn'];
	      $address=$_POST['address'];
	     $education=$_POST['education'];
	     $profession=$_POST['profession'];
		

	?>
	
	<table border="1">
		<tr>
			<th>NAME</th>
			<th>EGN</th>
			<th>ADDRESS</th>
			<th>EDUCATION</th>
			<th>PROFESSION</th>
		</tr>
		<tr>
			<td><?= $name?></td>
			<td><?= $egn ?></td>
			<td><?= $address?></td>
			<td><?= $education?></td>
			<td><?= $profession?></td>
		</tr>
	</table>

	<?php 
}
else{
	echo "Not valid input";
}
	
	}
?>