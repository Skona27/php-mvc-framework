<?php 

/**
* 
*/

class App {

	private $_controller 	= 'home';
	private $_method 		= 'index';
	private $_params 		= array();
	
	public function __construct() {
		$url = $this->getURL();

		if (file_exists('app/controllers/' . $url[0] . '.php')) {
			$this->_controller = $url[0];
			unset($url[0]);
		}

		require_once 'app/controllers/' . $this->_controller . '.php';

		$this->_controller = new $this->_controller;

		if(isset($url[1])) {
			if(method_exists($this->_controller, $url[1])) {
				$this->_method = $url[1];
				unset($url[1]);
			}
		}

		$this->_params = $url ? array_values($url) : array();

		call_user_func_array(array($this->_controller, $this->_method), $this->_params);
	}

	private function getURL() {
		if (isset($_GET['url'])) {

			$trimmedURL = rtrim($_GET['url'], '/');
			$filteredURL = filter_var($trimmedURL, FILTER_SANITIZE_URL);

			return explode('/', $filteredURL);
		}
	}
}