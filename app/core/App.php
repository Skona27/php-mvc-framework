<?php 

/*
 * App core class
 * Gets URL and loads controller
 * URL FORMAT - /controller/method/params 
 */

class App {

	private $_controller 	= 'Home';
	private $_method 		= 'index';
	private $_params 		= array();
	
	public function __construct() {
		$url = $this->getURL();

		// Look for controller file if exists
		if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
			$this->_controller = ucwords($url[0]);
			unset($url[0]);
		}

		// Require controller
		require_once '../app/controllers/' . $this->_controller . '.php';

		// Create new controller object
		$this->_controller = new $this->_controller;

		// Check, if the method is given in the URL
		if(isset($url[1])) {
			// Check, if method exists inside the controller class
			if(method_exists($this->_controller, $url[1])) {
				$this->_method = $url[1];
				unset($url[1]);
			}
		}

		// Get params from the URL
		$this->_params = $url ? array_values($url) : array();

		// Call method from the controller class, pass the params
		call_user_func_array(array($this->_controller, $this->_method), $this->_params);
	}

	private function getURL() {
		if (isset($_GET['url'])) {

			// Trim right slash
			$url = rtrim($_GET['url'], '/');
			// Sanitize URL string
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// Convert into array
			$url = explode('/', $url);

			return $url;
		}
	}
}