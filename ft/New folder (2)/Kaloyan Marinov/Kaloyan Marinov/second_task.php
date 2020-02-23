<?php  

$arr = [
	['city' => 'city1', 'Y' => 1980, 'P' => 100000, 'NF' =>6, 'SH' => 20, 'CA'=> 12, 'YI'=> 50000,],
	['city' => 'city2', 'Y' => 1970, 'P' => 40000, 'NF' => 10, 'SH' => 4, 'CA'=> 20, 'YI'=> 130000,],
	['city' => 'city3', 'Y' => 1960, 'P' => 12000, 'NF' => 7, 'SH' => 5, 'CA'=> 10, 'YI'=> 200000,],
	['city' => 'city4', 'Y' => 1950, 'P' => 60000, 'NF' => 8, 'SH' => 6, 'CA'=> 31, 'YI'=> 60000,],
	['city' => 'city5', 'Y' => 1923, 'P' => 50000, 'NF' => 15, 'SH' => 5, 'CA'=> 15, 'YI'=> 40000,],
];

$averageTIG = 0;
for ($i=0; $i < count($arr); $i++) { 



	$arr[$i]['TIG'] = ((($arr[$i]['NF']+($arr[$i]['SH'])/$arr[$i]['CA'])*100)*$arr[$i]['P']/$arr[$i]['CA'])*(2019-$arr[$i]['Y']);
	
	$averageTIG += $arr[$i]['TIG'];
	}

	echo "Average Tig is ". $averageTIG / count($arr);

	?>

	<table border="1">
	<tr>
		<td>име</td>
		<td>Година на основаване</td>
		<td>население </td>
		<td>брой предприятия</td>
		<td>брой спортни зали</td>
		<td>брой културни мероприятия годишно</td>
		<td>годишен приход на глава от население</td>
		<td>TIG</td>

	</tr>	

	<?php 
		for ($i=0; $i < count($arr) ; $i++) { 
	?>
	<tr>
	<?php
			foreach ($arr[$i] as $value) {
			?>
			<td><?= $value ?></td>
			<?php
			}
	?>
	</tr>
	<?php			
		}
	?>
	</tr>
</table>

<?php  

$minTIG = $arr[0]['TIG'];
$ind_city = 0;

for ($i=0; $i < count($arr); $i++) { 
	if ($arr[$i]['TIG'] < $minTIG) {
		$minTIG =  $arr[$i]['TIG'];
		$ind_city = $i;

	}
}
echo "The name of city with minTIG is " . $arr[$ind_city]['city'];