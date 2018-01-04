<?php

/*
 * Request Class
 * Run callback function
 */

class Request {
	
	public static function method($type = 'GET', $callback) {
		// If request is what we want, run callback
		if ($_SERVER['REQUEST_METHOD'] === $type) {
			$callback();
		}
	}
}