<?php 

trait Validator {

	public function is_positive_number( $num ) {
		if( $num < 0 || $num == 0 ){
			return "You need to provide dimension > 0!";
		}
	}
}