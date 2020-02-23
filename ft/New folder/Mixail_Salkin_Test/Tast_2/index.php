<?php


$array = [
	     ['producer' => 'ASUS', 'model' => 'Republic', 'CPU' => 5, 'HDD' => 500, 'RAM'=>8, 'SSD' => 300,'P' => 956],
	     ['producer' => 'HP', 'model' => 'Lego', 'CPU' => 7, 'HDD' => 1500, 'RAM' => 15, 'SSD' => 1600,'P' => 1500],
	     ['producer' => 'ACER', 'model' => 'Nitro', 'CPU' => 9, 'HDD' => 1200, 'RAM' => 10, 'SSD' => 200,'P' => 1000],
	     ['producer' => 'Razer', 'model' => 'Naga', 'CPU' => 3, 'HDD' => 500, 'RAM' => 5, 'SSD' => 330, 'P' => 1010],
	     ['producer' => 'Lenovo', 'model' => 'Legion', 'CPU' => '5', 'HDD' => '500', 'RAM' => 6, 'SSD' => 320,'P' => 856],
	     
         ];
 echo '<h1>IPK</h1> ';
 echo '<hr>';
$koef = 0;
for ($i = 0; $i < count($array); $i++) {
	$hdd = $array[$i]['HDD'];
	$ram = $array[$i]['RAM'];
	$ssd = $array[$i]['SSD'];
	$p = $array[$i]['P'];

    $ipk = (($hdd + $ssd * 3) + $ram) / $p;
	$ipk = round($ipk, 1);

	$array[$i]['IPK'] = $ipk;
	echo '<p>'.$array[$i]['producer'].' - '.$ipk.'</p>';

	$koef += $ipk;
}
echo '<hr>';
echo '<h2> ipk for all:'. $ipk/count($array).'</h2>';
echo '<hr>';

echo '<table border="1">';
echo '<tr>';
echo '<td> Producer </td>';
echo '<td> Model </td>';
echo '<td> CPU </td>';
echo '<td> RAM </td>';
echo '<td> HDD </td>';
echo '<td> SSD </td>';
echo '<td> Price </td>';
echo '<td> IPK </td>';
echo '</tr>';

for ($j = 0; $j < count($array); $j++) {
	echo '<tr>';
	echo '<td>'.$array[$j]['producer'].'</td>';
	echo '<td>'.$array[$j]['model'].'</td>';
	echo '<td>'.$array[$j]['CPU'].'</td>';
	echo '<td>'.$array[$j]['RAM'].'</td>';
	echo '<td>'.$array[$j]['HDD'].'</td>';
	echo '<td>'.$array[$j]['SSD'].'</td>';
	echo '<td>'.$array[$j]['P']. " " . "лв." . '</td>';
	echo '<td>'.$array[$j]['IPK']. " " . "лв." . '</td>';
	echo '</tr>';
}
echo '</table>';
echo '<hr>';

$max = $array[0]['IPK'];
$max_name = $array[0]['producer'];
for ($k = 0; $k < count($array); $k++) {
	if ($array[$k]['IPK'] > $max) {
		$max = $array[$k]['IPK'];
		$max_name = $array[$k]['producer'];
		$max_model = $array[$k]['model'];
	}
}

echo "<h1> Highest IPK : $max_name - $max_model";