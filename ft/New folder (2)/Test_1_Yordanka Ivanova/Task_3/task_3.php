<?php

$m=6;
$n=6;
$num=1;
$arr=[];

for ($i=0; $i < $m; $i++) { 
	$num=$i*3+1;

	for ($j=0; $j < $n; $j++) { 
		$arr[$i][$j]=$num;
		$num+=15;
		# code...
	}
	
}
echo "<table border=1>";
for ($i=0; $i <$m ; $i++) { 
	echo "<tr>";
	for ($j=0; $j <$n ; $j++) { 
		echo '<td>'.$arr[$i][$j].'</td>';
		# code...
	}echo "</tr>";

	# code...
}
echo "</table>";