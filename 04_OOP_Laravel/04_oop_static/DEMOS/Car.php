<?php 
class Car {
	static public $type = 'car';

	public $color;
	static public $num;

	public function __construct( $c ){
		$this->color = $c;	
	}

	static public function get_car_type(){
		return static::$type;
		// return self::$type;
	}

	static function get_car_num()
	{
		// static::$num = get num of cars from db
		//return static::$num;
	}


	
}