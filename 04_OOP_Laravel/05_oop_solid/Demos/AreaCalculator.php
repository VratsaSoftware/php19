<?php 

class AreaCalculator {

	public $shapes = [];

	public function __construct( $sh ){
		$this->shapes = $sh;
	}

	public function sum(){
		//$shapes
		$sum_areas = 0;
		
		foreach($this->shapes as $shape) {
			if( is_a( $shape, 'iShape') ){
				$sum_areas += $shape->calc_area();
			}
		}
		return $sum_areas;
	}

	public function output( $res ){
		echo 'The sum of areas is ' . $res;
	}
}