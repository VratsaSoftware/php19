<?php 

class HomePage extends Page {

	public $slider;
	public $banner;

	public function __construct( $t, $c, $f, $s, $b ){
		
		parent::__construct( $t, $c, $f );
		
		$this->banner = $b;
		$this->slider = $s;
	}

	public function render_header(){

		// echo $this->slider->text;
		echo $this->slider->get_text();
		echo "<br>";
		echo $this->banner;

		return parent::render_header();		
	}

	public function render_home_page_footer(){
		return parent::render_footer();
		
	}
}