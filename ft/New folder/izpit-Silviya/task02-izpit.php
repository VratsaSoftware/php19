<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	//masiv
	//iz4isl indeks pazarna konkurent.((HD + SSD*3)+RAM)/P
	//dobav koef kym masiva
	//sredniq koef-otpe4atva
	//otpe4atvane na tablica
	//модела с най-висок ипк

	$laptops=[
		['prod'=>'dell', 'model'=>'ag4', 'proc'=>'pentium', 'ram'=>'23', 'hd'=>'30', 'ssd'=>'70', 'p'=>'1000'],
		['prod'=>'acer', 'model'=>'vgn56', 'proc'=>'intel', 'ram'=>'26', 'hd'=>'20', 'ssd'=>'80', 'p'=>'1500'],
		['prod'=>'hp', 'model'=>'ww6', 'proc'=>'celeron', 'ram'=>'29', 'hd'=>'50', 'ssd'=>'90', 'p'=>'1600'],
		['prod'=>'asus', 'model'=>'aww8', 'proc'=>'pentium', 'ram'=>'40', 'hd'=>'45', 'ssd'=>'40', 'p'=>'1400'],
		['prod'=>'vaio', 'model'=>'ty0', 'proc'=>'intel', 'ram'=>'45', 'hd'=>'56', 'ssd'=>'60', 'p'=>'2000'],
	];


	$sum=0;
	$max=$laptops[0]['ipk'];
	
	$bes_prod=0;
	$best_model=0;

	$count=count($laptops);
	for ($i=0; $i <$count ; $i++) { 
		$laptops[$i]['ipk']=(pow(($laptops[$i]['hd']+$laptops[$i]['ssd']), 3)+$laptops[$i]['ram'])/$laptops[$i]['p'];
		$sum+=$laptops[$i]['ipk'];
	}

	// echo '<pre>';
	// var_dump($laptops);
	// echo '</pre>';

	$avg_ipk=$sum/$count;
	echo $avg_ipk;
	echo '<br>';
var_dump($max);
	for ($j=0; $j <$count ; $j++) { 
		var_dump($laptops[$j]['ipk']>$max);
		if ($laptops[$j]['ipk']>$max) {
			$max=$laptops[$j]['ipk'];
			$best_prod=$laptops[$j]['prod'];
			$best_model=$laptops[$j]['model'];
		}
	}

	echo $max;
	echo '<br>';
	echo $best_prod;
	echo '<br>';
	echo $best_model;

	


	echo '<table border ="1">';
	echo '<tr>';
	echo '<th>producer</th>';
	echo '<th>model</th>';
	echo '<th>processor</th>';
	echo '<th>ram</th>';
	echo '<th>hd</th>';
	echo '<th>ssd</th>';
	echo '<th>price</th>';
	echo '<th>ipk</th>';
	echo '</tr>';

	for ($i=0; $i <$count ; $i++) { 
		echo '<tr>';
		foreach ($laptops[$i] as $key => $value) {
			echo'<td>';
			echo $value;
			echo '</td>';
		}
		echo '</tr>';
	}

	echo '<tr>';
	echo '<td colspan=7>AVG IPK</td>';
	echo '<td>'.$avg_ipk.'<td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan=7>The best model</td>';
	echo '<td>'.$best_model.'<td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan=7>The best prod</td>';
	echo '<td>'.$best_prod.'<td>';
	echo '</tr>';

	echo '</table>';


	?>
	
</body>
</html>