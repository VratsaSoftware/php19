<?php 

include 'Car.php';
include 'Toyota.php';

echo Car::$type;

echo Toyota::$type;

// echo Car::get_car_type();
// echo Toyota::get_car_type();

// echo Toyota::get_toyota_self_type();

echo Car::get_car_type();
echo Toyota::get_car_type();


echo Car::get_car_num();
echo Toyota::get_car_num();

$toyota = new Toyota();

echo Toyota::get_car_num();