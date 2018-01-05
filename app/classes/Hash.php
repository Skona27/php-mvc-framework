<?php

/*
 * 
 */

class Hash {

	private static $_options = array(
		'cost' 	=> 11
	);

	public static function make($string) {
		return password_hash($string, PASSWORD_BCRYPT, self::$_options);
	}

	public static function unique($length = 32) {

		$keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $str = '';
	    $max = mb_strlen($keyspace, '8bit') - 1;

	    for ($i = 0; $i < $length; ++$i) {
	        $str .= $keyspace[random_int(0, $max)];
	    }

	    return $str;
	}
}