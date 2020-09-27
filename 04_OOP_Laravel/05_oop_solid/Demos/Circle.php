<?php 

class Circle implements iShape {

	use Validator;

	public $radius;

	public function __construct( $r ){
		$this->radius = $r;
	}


	public function calc_area(){
		return pi() * pow( $this->radius, 2 );
	}
}