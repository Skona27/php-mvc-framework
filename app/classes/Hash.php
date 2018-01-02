<?php

/**
* 
*/

class Hash {

	private static $_options = array(
		'cost' 	=> 11
	);

	public static function make($string) {
		return password_hash($string, PASSWORD_BCRYPT, self::$_options);
	}

	public static function unique($length = 16) {
		return uniqid($length);
	}
}