<?php

/*
 * Test Controller
 */

class Info extends Controller {
    // Default method inside our Info controller
    public function index() {
        // This code will run after GET request to /info
        Request::method("GET", function() {
            // Render the info/index template, pass the data
            $this->view("info/index", 
                ['active' => 'info/index']
            );
        });

        // This code will run after POST request to /info
		Request::method('POST', function(){
			// Instantiane new file from the 'file' input
			$file = new File(Input::get('file'));

			// Try to upload it
			$file->upload();

			// Print error msg if error occured
			if ($file->error()) {
				echo $file->messageError();
			} else {
				echo "File uploaded! ";
				// Delete after upload
                File::delete($file->name());
                echo "File deleted! ";
			}
		});
    }
}
