<?php 

class VolumeCalculator {
	public $shapes = [];

	public function __construct( $sh ){
		$this->shapes = $sh;
	}

	public function sum(){
		//$shapes
		$sum_volumes = 0;
		
		foreach($this->shapes as $shape) {
			if( is_a( $shape, 'iVolume') ){
				$sum_volumes += $shape->calc_volume();
			}
		}
		return $sum_volumes;
	}

	public function output( $res ){
		echo 'The sum of volumes is ' . $res;
	}
}