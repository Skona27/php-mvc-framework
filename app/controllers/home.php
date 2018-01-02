<?php

/**
* 
*/

class Home extends Controller {

	public function index($string) {

		$this->view('home/index',
			['active' => 'home/index']
		);
	}
}