<?php
$arr = [];
$n = 6;
$m = 6;
$br = 1;
$p = 0;
for ($i=0; $i < $m; $i++) { 
	$arr[$i] = [];
	for ($j=0; $j < $n; $j++) {
		if ($j !=0) {
			$p = $arr[$i][$j-1]+15;
		$arr[$i][$j] = $p;
		}else{ 
		$arr[$i][$j] = $br;			
		}
	}
	$br+=3;
}
echo "<table border=1>";
for ($r=0; $r < $m; $r++) { 
	echo "<tr>";
	for ($c=0; $c < $n; $c++) { 
		echo "<td>";
		echo $arr[$r][$c];
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";