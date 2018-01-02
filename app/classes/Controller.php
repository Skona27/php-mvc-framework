<?php

/**
* 
*/

class Controller {

	public function view($view, $data = array()) {
		require_once 'app/views/partials/header.php';
		require_once 'app/views/' . $view . '.php';
		require_once 'app/views/partials/footer.php';
	}
}