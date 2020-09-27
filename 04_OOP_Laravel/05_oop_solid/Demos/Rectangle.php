<?php 

class Rectangle implements iShape{

	public $a_side;
	public $b_side;

	public function __construct( $a, $b ){
		$this->a_side = $a;
		$this->b_side = $b;
	}

	public function calc_area(){
		
		return $this->a_side * $this->b_side;
	}
}