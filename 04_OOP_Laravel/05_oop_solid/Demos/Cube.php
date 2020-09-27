<?php 

class Cube extends Square implements iVolume{

	
	public $flat_area;

	public function __construct( $s){

		parent::__construct( $s );
		$this->flat_area = parent::calc_area();

	}


	public function calc_area(){
		
		return $this->flat_area * 6;
	}

	public function calc_volume(){
		
		$this->is_positive_number( $this->side );
		return $this->flat_area * $this->side;
		
	}
	
}