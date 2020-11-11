<?php 

class Cinema {
	public $address; 
	public $halls; 
	public $cafe; 
	public $film_screening; 
	public $ticket_sellers; 

	public function buy_movie(){

	}
	public function add_film_screening_info(){

	}

}

$cinema = new Cinema();

echo $cinema->address;

$cinema->add_film_screening();

class Hall implements CheckInterface {
	public $hall;

	public function add_film_to_hall(){

	}
	public function is_free( $hall ){

	}
}

interface CheckInterface {
	public function is_free( $object );
}