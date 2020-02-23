<!DOCTYPE html>
<html>
<head>
	<title>Task 2</title>
</head>
<body>

<?php 

$towns = [
	[
		'name' => "София",
		'Y' => 1920,
		'P' => 3000000,
		'NF' => 20000,
		'SH' => 13050,
		'CA' => 2590,
		'YI' => 2000,
	],
	[
		'name' => "Враца",
		'Y' => 1910,
		'P' => 100000,
		'NF' => 800,
		'SH' => 135,
		'CA' => 200,
		'YI' => 1200,
	],	
	[
		'name' => "Бургас",
		'Y' => 1869,
		'P' => 1500000,
		'NF' => 2000,
		'SH' => 1471,
		'CA' => 1029,
		'YI' => 1763,
	],	
	[
		'name' => "Варна",
		'Y' => 1824,
		'P' => 1243000,
		'NF' => 1869,
		'SH' => 1203,
		'CA' => 1530,
		'YI' => 1846,
	],	
	[
		'name' => "Пловдив",
		'Y' => 1799,
		'P' => 900000,
		'NF' => 1230,
		'SH' => 968,
		'CA' => 982,
		'YI' => 1570,
	],
];

$count = count($towns);
$sum_TIG = 0;
$avr_TIG = 0;

for ($i=0; $i < $count; $i++) { 
	$towns[$i]['TIG'] = (((($towns[$i]['NF']+$towns[$i]['SH'])/$towns[$i]['CA'])*100)*$towns[$i]['P']/$towns[$i]['CA'])*(2019-$towns[$i]['Y']);

	$sum_TIG += $towns[$i]['TIG'];
}

$min = $towns[0]['TIG'];
$min_ind = 0;

for ($j=0; $j < $count; $j++) { 
	if($towns[$j]['TIG'] < $min){
		$min = $towns[$j]['TIG'];
		$min_ind = $j;
	}
}

$avr_TIG = $sum_TIG / $count;

echo "<table border=1>";
?>
	<tr>
		<td>Име на града</td>
		<td>Година на създаване</td>
		<td>Население</td>
		<td>Брой предприятия</td>	
		<td>Брой спортни зали</td>
		<td>Брой културни мероприятия годишно</td>
		<td>Годишен приход на глава от населението</td>
		<td>Индекс на растеж на града</td>
	</tr>
<?php
for ($g=0; $g < $count; $g++) { 
	echo "<tr>";
	foreach ($towns[$g] as $value) {
		echo "<td>" . $value . "</td>";
	}
	echo "</tr>";
}
?>
	<tr>
		<td colspan="7">Стредния индекс на растеж на градовете е:</td>
		<td><?= $avr_TIG ?></td>
	</tr>
</table>
	<p>Града с най - нисък индекс на растеж е: <?= $towns[$min_ind]['name'] ?>. А неговия индекс е : <?= $towns[$min_ind]['TIG']?></p>
</body>
</html>