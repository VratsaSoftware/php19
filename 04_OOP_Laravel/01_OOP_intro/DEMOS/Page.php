<?php 

class Page {

	private $title;
	// protected $title;
	// public $title;
	public $header;
	public $content;
	private $footer = 'I am default the footer';
	// protected $footer = 'I am default the footer';
	// public $footer = 'I am default the footer';

	public function __construct( $param1, $param2 ){
		$this->title = $param1;
		$this->content = $param2;
	}

	public function render_header(){
		$this->render_title();
		$this->render_menu();
	}
	public function render_menu(){
		echo 'The menu';
	}
	protected function render_title(){
		echo $this->title;
	}

	public function render_content(){
		echo $this->content;
	}

	public function render_footer(){
		echo 'I am the footer';
	}

}