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
define('DB_PASS', '');
define('DB_NAME', 'framework');


// File maximum size, in mb
define('FILE_MAX_SIZE', 4);

// Allowed extensions
define('FILE_EXT', array(
	'jpg',
	'jpeg',
	'png',
));

// Root for the upload directory
define('UPLOAD_ROOT', PUBLIC_ROOT.'/uploads');

// Cookie expiry time in seconds
define("COOKIE_EXPIRY", 7 * 86400);

// Start session
session_start();

// Autoload classes
spl_autoload_register(function ($class) {
    require_once 'core/' . $class . '.php';
});
