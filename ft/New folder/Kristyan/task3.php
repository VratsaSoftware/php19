<?php 
$m = 5; //tr
$n = 5; //td
$num = 1;
$arr=[];
for ($i=0; $i <$m; $i++) { 
	$num = ($i+1);
	for ($g=0; $g <$n ; $g++) { 		
			$arr[$i][$g] = $num;
			$num = $num +4;
		}
	}
echo "<table border=1>";
for ($k=0; $k < $m ; $k++) { 
    echo "<tr>";
for ($e=0; $e < $n ; $e++) { 
    echo "<td>" . $arr[$k][$e] . "</td>"; 
}
echo "</tr>";
};
echo "</table>";
 ?>



