<?php 

$cars = [
	['brand' => 'Volvo', 'model' => 'ws', 'price' => 20000],
	['brand' => 'Fiat', 'model' => 'model1', 'price' => 15000],
	['brand' => 'BMW', 'model' => 'model2', 'price' => 25000],
];

echo '<table border=1>';
echo '<tr>';
echo '<td>brand</td>';
echo '<td>model</td>';
echo '<td>price</td>';
echo '</tr>';
for( $i = 0; $i < count($cars); $i++){
	echo "<tr>";
	foreach ($cars[$i] as $key => $value) {
		echo '<td>';
		echo $value;
		echo '</td>';		
	}
	echo "</tr>";
}
echo '</table>';

