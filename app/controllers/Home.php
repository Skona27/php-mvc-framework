<?php

/*
 * Home Controller
 */

class Home extends Controller {

	public function index() {
		// GET request
		Request::method('GET', function(){
	
			// Load the view, pass data
			$this->view('home/index',
				['active' => 'home/index']
			);

		});
	}
}