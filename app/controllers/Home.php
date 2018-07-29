<?php

/*
 * Home Controller
 */

class Home extends Controller {

	public function index() {
		// GET request
		Request::method('GET', function(){
		    // Load the view
			$this->view('home/index');

		});
	}
}