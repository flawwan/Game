<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');
date_default_timezone_set('Europe/Stockholm');
define('BASE', __DIR__ . DIRECTORY_SEPARATOR);

class Autoloader
{
	/**
	 * Autoload a class
	 *
	 * @param string $className The name of the class to be autoloaded
	 *
	 * @return null
	 */
	public static function classLoader($className)
	{
		require BASE . $className . '.php';
	}
}

spl_autoload_register('Autoloader::classLoader');

new User();
