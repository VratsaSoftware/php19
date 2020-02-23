<?php 



$laptops = [
	['producer' => 'dell', 'model' => 'vostro', 'processor' => 'intel', 'RAM' => 16, 'HD'=>1000,'SSD' => 120, 'price' => 1250],
	['producer' => 'toshiba', 'model' => 'satelite', 'processor' => 'amd', 'RAM' => 8, 'HD'=>1200, 'SSD' => 240, 'price' => 1500],
	['producer' => 'lenovo', 'model' => 'thinkpad', 'processor' => 'intel', 'RAM' => 12,'HD'=>500, 'SSD' => 500, 'price' =>2000],
	['producer' => 'acer', 'model' => 'aspire', 'processor' => 'intel', 'RAM' => 16, 'HD'=>600,'SSD' => 124, 'price' =>2200],
	['producer' => 'msi', 'model' => 'gv62', 'processor' => 'amd', 'RAM' => 4, 'HD'=>750, 'SSD' => 750,'price'=>1800],
		];


		//ИПК = ((HD + SSD*3)+RAM)/P

$count = count($laptops);

for ($i=0; $i < $count; $i++) { 
	$current = (($laptops[$i]['HD']+($laptops[$i]['SSD'])*3)+$laptops[$i]['RAM'])/$laptops[$i]['price'];

	$laptops[$i]['IPK'] = $current;
}

$sum = 0;

for($j = 0; $j < $count; $j++){
	$sum += $laptops[$j]['IPK'];
}

$avg = $sum/$count;

echo $avg;

echo "<table border=1>";
echo "<tr>
		<td>Producer</td>
		<td>Model</td>
		<td>Processor</td>
		<td>RAM</td>
		<td>HDD</td>
		<td>SSD</td>
		<td>PRICE</td>
		<td>IPK</td>
	</tr>";
for($k = 0; $k < $count; $k++){
	echo "<tr>";
	foreach ($laptops[$k] as $value) {
		echo "<td>$value</td>";
	}
	echo "</tr>";
}
echo "</table>";

$max = $laptops[0]['IPK'];
$max_ipk = 0;

for($p = 0; $p < $count; $p++){
	if($laptops[$p]['IPK'] > $max){
		$max_ipk = $laptops[$p]['IPK'];
		$max_ipk = $p;
	}
}

echo 'The laptop with highest IPK  is producer ' . $laptops[$max_ipk]['producer'].' model is '.$laptops[$max_ipk]['model'];




