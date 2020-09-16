<?php 

class Slider {
	
	private $text;
	public $photos;

	public function __construct( $t, $ph ){
		$this->text = $t;
		$this->photos = $ph;
	}

	public function get_text(){
		return $this->text;
	}
}