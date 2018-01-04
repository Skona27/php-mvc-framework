<?php

/*
 * Initialization file
 * Contains defined variables
 * Sets the autoloader
 */


// Root for the app directory
define('APPROOT', dirname(__FILE__));

// Public URL
define('URL', 'http://localhost/php-mvc-framework');

// Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'php-mvc-framework');

// Autoload classes
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});
