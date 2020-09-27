<?php 
include 'iShape.php';
include 'iVolume.php';

include 'Validator.php';

include 'Circle.php';
include 'Square.php';
include 'Rectangle.php';
include 'Cube.php';

include 'AreaCalculator.php';
include 'VolumeCalculator.php';

// $circle = new Circle(6);
// $circle2 = new Circle(3);
// $square = new Square(2);

// $shapes = [$circle, $circle2, $square];
$shapes = [new Circle(6), new Circle(3), new Square(2),new Rectangle(2, 5), new Cube(2)];
$area_calculator = new AreaCalculator( $shapes );

$sum = $area_calculator->sum();
$area_calculator->output( $sum );

$volume_calculator = new VolumeCalculator( $shapes );
$volumes = $volume_calculator->sum();
$volume_calculator->output( $volumes );

