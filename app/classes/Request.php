<?php

/**
* 
*/

class Request {
	
	public static function exists($type = 'POST') {
		switch($type) {
			case 'POST':
				return (!empty($_POST)) ? true : false;
				break;
			case 'GET':
				return (!empty($_GET)) ? true : false;
				break;
			default:
				return false;
				break;
		}
	}
}