<?php 

$car1 = ['brand' => 'Volvo', 'model' => 'ws', 'price' => 20000];
$car2 = ['brand' => 'Fiat', 'model' => 'model1', 'price' => 15000];
$car3 = ['brand' => 'BMW', 'model' => 'model2', 'price' => 25000];

echo $car1['model']; 
echo $car3['price'];

$car = [
	['brand' => 'Volvo', 'model' => 'ws', 'price' => 20000],
	['brand' => 'Fiat', 'model' => 'model1', 'price' => 15000],
	['brand' => 'BMW', 'model' => 'model2', 'price' => 25000],
];

echo $car[2]['price'];