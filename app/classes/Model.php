<?php

/*
 * Base Model
 * Interacts with the database
 */

class Model {

	protected $db;

	public function __construct() {
		$this->db = Database::instance();
	}

}