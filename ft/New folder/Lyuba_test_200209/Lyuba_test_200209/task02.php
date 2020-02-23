Задача 2.
Дефинирайте масив, който пази информация за пет лаптопа - техния производител, модел, тип процесор, капацитет на RAM/RAM/, капацитет на хард диск/HD/, капацитет на ssd/SSD/, цена/P/.
Изчислете за всеки лаптоп индекс за пазарна конкурентноспособност - ИПК по формулата – ИПК = ((HD + SSD*3)+RAM)/P и добавете този коефициент към информацията, която съхранявате в масива за всеки елемент.
Намерете средния ИПК за лаптопите, за които съхранявате информация в масива и го отпечатайте.
Отпечатайте информацията, която съхранявате в масива под формата на таблица, като всяка колона трябва да има название – производител, модел и т.н.
Намерете и отпечатайте модела и производителя на лаптопа с най-висок ИПК. 15 т.

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
</body>
</html>

<?php

$arr = [
	[	'DELL' => 'model1', 'processor' => 'Intel',	'RAM' => 6, 'HD' => 1, 'SSD' => 250, 'P' => 850,],
	[	'ASUS' => 'model2',	'processor' => 'Intel',	'RAM' => 4, 'HD' => 500, 'SSD' => 125, 'P' => 650,],
	[	'Toshiba' => 'model3', 'processor' => 'Intel', 'RAM' => 3,	'HD' => 1,	'SSD' => 250, 'P' => 1050,],
	[	'Lenovo' => 'model4', 'processor' => 'Intel', 'RAM' => 8, 'HD' => 500, 'SSD' => 250,'P' => 1450,],
	// [	'Apple' => 'model5', 'processor' => 'Intel', 'RAM' => 16, 'HD' => = 3, 'SSD' => 256,'P' => 3450,],
];

$sum_r = 0;
$count = count($arr);

/*ИПК = ((HD + SSD*3)+RAM)/P */

for ($i=0; $i < $count; $i++){
	$arr[$i]['IPK'] = (($arr[$i]['HD'] +$arr[$i]['SSD'] * 3) + $arr[$i]['RAM'])/$arr[$i]['P'];
	$sum_r += $arr[$i]['IPK'];
}

$avr_r = $sum_r/$count;
echo $avr_r;
$max = $arr[0]['IPK'];
$max_ind = 0;

for ($j = 0; $j <$count; $j++){
	if($arr[$j]['IPK'] < $max){
		$max= $arr[$j]['IPK'];
		$max_ind = $j;
	}
}

?>

<table border="1">
	<tr>
		<td>Производител</td>
		<td>Модел</td>
		<td>Тип Процесор</td>
		<td>RAM</td>
		<td>HD</td>
		<td>SSD</td>
		<td>Цена</td>
	</tr>
	<?php
	for ($g=0; $g < $count; $g++){
		echo "<tr>";
		foreach ($arr[$g] as $v) { 
	?>
	<td><?= $v  ?></td>
	<?php
		}
		echo "</tr>";
	}
?>
</table>
