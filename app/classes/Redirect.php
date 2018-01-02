<?php 

/**
* 
*/

class Redirect {

	public static function to($location = null) {
		if($location) {
			if(is_numeric($location)) {
				switch($location) {
					case 404:
						header('Location: ');
						break;
					default:
						break;
				}
			}	else {
				header('Location: ' . Config::get('root/path') . $location);
				exit();
			}
		}
	}
}