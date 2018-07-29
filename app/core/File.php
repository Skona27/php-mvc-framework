<?php

/*
 * File Class
 * Upload files
 * Simple file validation
 * Removing files
 */

class File {

	private $_name,
			$_tmpName,
			$_ext,
			$_size,
			$_error,
			$_path;


	public function __construct($file = array()) {

		$this->_error 	= 	$file['error'];

		// Check for the initial upload error
		if (!$this->error()) {

			// Assign properties
			$this->_size 	= 	$file['size'];
			$this->_name 	= 	Hash::unique(20);
			$this->_tmpName = 	$file['tmp_name'];
			$this->_ext     = 	$this->getFileExtension($file['name']);
			$this->_path	=	UPLOAD_ROOT;

			// Validate file
			$this->validate();
		}
	}

	private function validate() {
		// Check for the file size
		if ($this->_size > FILE_MAX_SIZE * 1000000) {
			$this->_error = 1;
		}

		// Check for the file ext
		if (!in_array($this->_ext, FILE_EXT)) {
			$this->_error = 8;
		}
	}
	
	private function getFileExtension($fileName) {
		// Get the file extension
		$ext = explode('.', $fileName);
		// Lowercase it
		$ext = strtolower(end($ext));

		return $ext;
	}

	public function upload() {
		// Check for the error 
		if (!$this->_error) {

			// Set file destination as path/name.ext
			$path = $this->_path .'/'. $this->_name .'.'. $this->_ext;

			// Try to move file
			if (!move_uploaded_file($this->_tmpName, $path)) {
				// Set error
				$this->_error = 7;
			}
		}
	}

	public static function delete($name) {
		// Set the file path
		$path = UPLOAD_ROOT . '/' . $name;

		// See if file exists
		if(file_exists($path)) {
			// Delete file
			unlink($path);
			return true;
		}	else return false;
	}

	public function error() {
		// Return if error exists
		return ($this->_error) ? true : false;
	}

	public function name() {
		// return file new name plus ext
		return $this->_name .'.'. $this->_ext;
	}

	public function messageError() {
		// Switch on error type, return error message
		switch ($this->_error) {
            case 1:             
            case 2:
                $message = "The uploaded file was too large.";
                break;
            case 3:
                $message = "The uploaded file was only partially uploaded.";
                break;
            case 4:
                $message = "No file was uploaded.";
                break;
            case 6:
                $message = "Missing a temporary folder.";
                break;
            case 7:
                $message = "Failed to write file to disk.";
                break;
            case 8:
                $message = "Wrong file extension.";
                break;

            default:
                $message = "Unknown upload error.";
                break;
        }

        return $message; 
	}

}