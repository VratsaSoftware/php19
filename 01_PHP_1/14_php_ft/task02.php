<?php 

//declare array
//subarray declaration
$arr = [
	['name' => 'name1', 'JF' => 1, 'D' => 10, 'C' => 20, 'P'=> 2],
	['name' => 'name2', 'JF' => 3, 'D' => 4, 'C' => 4, 'P'=> 20],
	['name' => 'name3', 'JF' => 8, 'D' => 12, 'C' => 5, 'P'=> 10],
	['name' => 'name4', 'JF' => 4, 'D' => 6, 'C' => 6, 'P'=> 3],
	['name' => 'name5', 'JF' => 10, 'D' => 5, 'C' => 5, 'P'=> 5],
];

$sum_r = 0;
$count = count($arr);
//calculate R = ((JF+D)2+C*2)/P  for each subbarray
for($i = 0; $i < $count; $i++){
	//add R to each subarray
	$arr[$i]['R']= (($arr[$i]['JF']+$arr[$i]['D'])*($arr[$i]['JF']+$arr[$i]['D'])+$arr[$i]['C']*2)/$arr[$i]['P'];

	$sum_r += $arr[$i]['R'];
}

//calc average R
$avg_r = $sum_r/$count;

//find ind of the lowest R
$min = $arr[0]['R'];
$min_ind = 0;
for($j = 0; $j < $count; $j++){
	if($arr[$j]['R'] < $min){
		$min = $arr[$j]['R'];
		$min_ind = $j;
	}
}

?>
<table border="1">
	<tr>
		<td>
			name
		</td>
		<td>JF</td>
		<td>D</td>
		<td>C</td>
		<td>Sport</td>
		<td>R</td>
	</tr>	
	<?php 
		for ($p=0; $p < $count ; $p++) { 
	?>
	<tr>
	<?php
			foreach ($arr[$p] as $value) {
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
<p>Средна стойност на индекс на затлъстяване - <?= $avg_r ?></p>
<p><?= $arr[$min_ind]['name']?> има минимален индекс - <?= $arr[$min_ind]['R'] ?> </p>