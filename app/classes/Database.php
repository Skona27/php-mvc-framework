<?php

/*
 * PDO Database Class
 * Connect to the database
 * Create and execute statements
 * Return results
 */

class Database {

	private static 	$_instance;

	private 		$_host		= 	DB_HOST,
					$_username	=	DB_USER,
					$_password	=	DB_PASS,
					$_dbname	=	DB_NAME;

	private 		$_pdo,
					$_query,
					$_results,
					$_error;


 	private function __construct() {
 		// Set DSN
 		$dsn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_dbname;

 		// PDO attributes
		$options  = array(
            PDO::ATTR_ERRMODE            	=> PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   	=> FALSE,
            PDO::ATTR_PERSISTENT			=> TRUE,
        );

		// Create PDO instance
		try {
			$this->_pdo = new PDO($dsn, $this->_username, $this->_password, $options);

		} catch(PDOException $e) {
			// If error occured, echo error message
			die($e->getMessage());
		}
	}

	public static function instance() {
	 	if (!isset(self::$_instance)) {
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

	public function results() {
		return $this->_results;
	}

	public function first() {
		return $this->_results[0];
	}

	public function error() {
		return $this->_error;
	}
}