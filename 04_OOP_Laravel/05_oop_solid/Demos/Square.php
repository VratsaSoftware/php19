<?php 

class Square implements iShape{

	use Validator;

	public $side;

	public function __construct( $s ){
		$this->side = $s;
	}

	public function calc_area(){

		$this->is_positive_number( $this->side );
		return pow( $this->side, 2 );
		
	}
}

