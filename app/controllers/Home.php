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

		//POST request
		Request::method('POST', function(){
			// Instantiane new file from the 'file' input
			$file = new File(Input::get('file'));

			// Try to upload it
			$file->upload();

			// File::delete();

			// Print error msg if error occured
			if ($file->error()) {
				echo $file->messageError();
			} else {
				echo "File uploaded!";
			}
		});
	}
}