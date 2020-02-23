<?php
//create array w/ towns
//Calc tig and add it to arr
//Find average tig
//Crate table
//Town with smallet tig
$towns = [
["Vratsa", 1456, 80000, 7, 20, 50, 900000],
["Pernik", 1721, 7000, 4, 4, 10, 90000],
["Burgas", 456, 800, 7, 20, 50, 900000],
["Plovdiv", 1324, 400000, 54, 30, 50, 10000],
["Sofia", 1289, 80000, 10, 60, 100, 500000],
];
$sum_tig = 0;
for ($i=0; $i < count($towns); $i++) { 
	$p = $towns[$i][1];
	$nf = $towns[$i][2];
	$sh = $towns[$i][3];
	$ca = $towns[$i][4];
	$yi = $towns[$i][5];
	$tig = (((($nf+$sh)/$ca)*100)*$p/$ca)*(2019 - $yi);
//	echo $tig."<br>";
	$sum_tig+=$tig;
	$towns[$i][6] = $tig;
}
// var_dump($towns);
?>
<table border="1">
	<tr>
		<td>Име</td>
		<td>Година на основаване</td>
		<td>Население</td>
		<td>Брой предприятия</td>
		<td>Брой спортни зали</td>
		<td>Брой културни мероприятия годишно</td>
		<td>tig</td>
	</tr>
	<?php
		for ($j=0; $j < count($towns); $j++) { 
			echo "<tr>";
			foreach ($towns[$j] as $value) {
				?>
				<td><?= $value ?></td>
				<?php	
			}
		}
	?>
	</tr>
</table>
<?php
echo "Average TIG - ".$sum_tig/count($towns);
echo "<br>";
$smallest = $towns[0][6];
$smallest_ind = 0;
for ($p=0; $p < count($towns); $p++) { 
	if ($towns[$p][6]< $smallest) {
		$smallest = $towns[$p][6];
		$smallest_ind = $p;
	}
}
echo "Smallest TIG has: ".$towns[$smallest_ind][0];
?>
<p></p>
