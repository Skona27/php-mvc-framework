<?php 

/*
 * Redirect Class
 * Redirects to location
 * Handles error
 */

class Redirect {

	public static function to($location = null) {
		if($location) {
			// Switch on location if numeric
			if(is_numeric($location)) {
				// Load error page
				switch($location) {
					case 404:
						header('Location: ');
						break;
					default:
						break;
				}
			}	else {
				// Redirect to location
				header('Location: ' . URL .'/'. $location);
				exit();
			}
		}
	}
}