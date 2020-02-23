<?php  
$row = 6;
$coll = 8;
$arr = [];
$count;


for ($i=0; $i < $row; $i++) { 
		$count = 1 + ($i *3);
	for ($j=0; $j < $coll; $j++) { 

		$arr[$i][$j]  = $count;
		$count +=15;
	
	}
	$count = 0;
}
?>
<table border="1">
<?php  

	for ($i=0; $i <$row ; $i++) { 
		?> <tr> <?php 
				for ($j=0; $j < $coll ; $j++) { 
					?> <td> <?=  $arr[$i][$j]; ?> </td> <?php  
				}?>
		 
		</tr>
<?php  } ?>
</table>