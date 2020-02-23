<?php
$m=4;
$n=6;
$value=1;
$ini_value=1;
$masiv=[];
echo '<table border=1>';
for ($i=0; $i<$m; $i++)
{$value=$ini_value;
	echo '<tr>';
	for ($j=0; $j<$n; $j++)
	{
		$masiv[$i][$j]=$value;
		$value+=15;
		echo '<td>'.$masiv[$i][$j].'</td>';
	}
	$ini_value+=3;
	echo '</tr>';
}
echo '</table>';