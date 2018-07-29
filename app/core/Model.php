<?php

/*
 * Base Model
 * Interacts with the database
 */

class Model {

	protected $_db;

	public function __construct() {
		$this->_db = Database::instance();
	}

}