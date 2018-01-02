<?php

/**
* 
*/

session_start();

$GLOBALS['config'] = array(
	'mysql'		=> array(
		'host' 		=> '127.0.0.1',
		'db' 		=> 'php-mvc-framework',
		'username' 	=> 'root',
		'password' 	=> 'root'),
	'root'		=> array(
		'path' 		=> 'http://localhost/php-mvc-framework/',
		'dir'		=> $_SERVER['DOCUMENT_ROOT'] . '/php-mvc-framework/'),
);


spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});
