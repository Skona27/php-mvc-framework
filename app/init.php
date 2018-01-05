<?php

/*
 * Initialization file
 * Contains defined variables
 * Sets the autoloader
 */


// Root for the app directory
define('APP_ROOT', dirname(__FILE__));

// Root for the public directory
define('PUBLIC_ROOT', dirname(__FILE__).'/../public');

// Public URL
define('URL', 'http://localhost/php-mvc-framework');


// Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'php-mvc-framework');


// File maximum size, in mb
define('FILE_MAX_SIZE', 2);

// Allowed extensions
define('FILE_EXT', array(
	'jpg',
	'jpeg',
	'png',
));

// Root for the upload directory
define('UPLOAD_ROOT', PUBLIC_ROOT.'/uploads');



// Start session
session_start();



// Autoload classes
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});
