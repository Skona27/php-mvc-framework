<?php

/**
* 
*/

class Database {

	private static 	$_instance;
	private 		$_pdo,
					$_results,
					$_error = false;

 	private function __construct() {
		$options  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );

	    $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db').';charset=utf8', Config::get('mysql/username'), Config::get('mysql/password'), $options);
	}

	public static function instance() {
	 	if(!isset(self::$_instance)) {
			self::$_instance = new Database();
		}		
		return self::$_instance;
	}

	public function query($query, $params = array()) {
		$this->_error = false;
		$this->_results = [];

		$stmt = $this->_pdo->prepare($query);

	    if (!$stmt->execute($params)) {
			$this->_error = true;
	    } else {
	    	$this->_results = $stmt->fetchAll();
	    }

	    return $this;
	}

	public function error() {
		return $this->_error;
	}

	public function results() {
		return $this->_results;
	}

	public function first() {
		return $this->_results[0];
	}
}