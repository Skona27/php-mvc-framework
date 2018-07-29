<?php

/*
 * Base Controller
 * Loads the views and the models
 */

class Controller {
    protected $_model;

	// Load the model
	public function model($model) {
		// Require the model file
		require_once '../app/models/' . $model . '.php';

		// Instantiate new model object
		return new $model();
	}

	// Load the view
	public function view($view, $data = array()) {
		// Require the header file
		require_once '../app/views/partials/header.php';
		// Require the view file
		require_once '../app/views/' . $view . '.php';
		// Require the footer file
		require_once '../app/views/partials/footer.php';
	}
}