<?php
	$cities = [
		['name' => 'Враца', 'Y' => 1745, 'P' => 49000, 'NF' => 3, 'SH' => 1, 'CA' => 23, 'Yl' => 7200],
		['name' => 'Берковица', 'Y' => 1563, 'P' => 14000, 'NF' => 1, 'SH' => 1, 'CA' => 12, 'Yl' => 6000],
		['name' => 'Монтана', 'Y' => 1900, 'P' => 52000, 'NF' => 10, 'SH' => 1, 'CA' => 32, 'Yl' => 8100],
		['name' => 'Мездра', 'Y' => 1952, 'P' => 15000, 'NF' => 1, 'SH' => 1, 'CA' => 10, 'Yl' => 6400],
		['name' => 'Ботевград', 'Y' => 1823, 'P' => 24000, 'NF' => 12, 'SH' => 1, 'CA' => 32, 'Yl' => 8000],
	];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Задача 2</title>
</head>
<body>
<?php
	$avg_tig = 0;
	$lowest_tig = (((($cities[0]['NF'] + $cities[0]['SH']) / $cities[0]['CA']) * 100) * $cities[0]['P'] / $cities[0]['CA']) * (2019-$cities[0]['Y']);
	$lowest_tig_city = $cities[0]['name'];
	$table_string = '<table><thead><tr><td>Име</td><td>Година на основаване</td><td>Население</td><td>Брой предприятия</td><td>Брой спортни зали</td><td>Брой културни мероприятия</td><td>Годишен приход</td><td>Индекс на растеж</td></tr></thead><tbody>';
	$count = sizeof($cities);
	for ($i=0; $i < $count; $i++) { 
		$cities[$i]['tig'] = (((($cities[$i]['NF'] + $cities[$i]['SH']) / $cities[$i]['CA']) * 100) * $cities[$i]['P'] / $cities[$i]['CA']) * (2019-$cities[$i]['Y']);
		$table_string .= '<tr>' . '<td>' . $cities[$i]['name'] . '</td>' . '<td>' . $cities[$i]['Y'] . '</td>' . '<td>' . $cities[$i]['P'] . '</td>' . '<td>' . $cities[$i]['NF'] . '</td>' . '<td>' . $cities[$i]['SH'] . '</td>' . '<td>' . $cities[$i]['CA'] . '</td>' . '<td>' . $cities[$i]['Yl'] . '</td>' . '<td>' . round($cities[$i]['tig'], 2) . '</td>' . '</tr>';
		$avg_tig += $cities[$i]['tig'];
		if ($lowest_tig > $cities[$i]['tig']){
			$lowest_tig = $cities[$i]['tig'];
			$lowest_tig_city = $cities[$i]['name'];
		} 
	}
	$table_string .= '</tbody></table>';
	echo 'Среден индекс на растеж за всички градове: ' . round(($avg_tig / $count), 2) . '<p>';
	echo $table_string . '<p>';
	echo 'Градът с най-нисък индекс на растеж е ' . $lowest_tig_city . ' със стойност от ' . $lowest_tig;
	echo '<p><a href="..\index.php">Обратно</a>';
?>
</body>
</html>