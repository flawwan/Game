<?php

new Bootstrap();

class Bootstrap
{
	private $user = null;

	function __construct()
	{

		date_default_timezone_set('Europe/Stockholm'); //php 5.6

		session_start();
		/////////////////////DEBUG////////////////////
		error_reporting(E_ALL);
		ini_set('display_errors', 'on');
		/////////////////////END DEBUG////////////////////

		define('BASE', __DIR__ . DIRECTORY_SEPARATOR);

		require 'Autoloader.php';
		spl_autoload_register('Autoloader::classLoader');

		$this->user = new User();
	}
}