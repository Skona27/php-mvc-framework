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

    public function testDB() {
        Request::method("GET", function() {
            // Delete every single record in users table
            Database::instance()->query('DELETE FROM users WHERE 1=1');

            // Insert data into users table
            $insert = Database::instance()->query('INSERT INTO users VALUES (:id, :name, :email, :password)',
             ['id' => 0, 'name' => 'John Snow', 'email' => 'john@winterfell.com', 'password' => 'kinginthenorth93']);

            if(!$insert->error()) {
                // If no error, get the data and print it on the page
                $result = Database::instance()->query('SELECT * FROM users WHERE name= :name',
                 ['name' => 'John Snow'])->first();

                echo "<pre>";
                var_dump($result);
            }
        });
    }
}
