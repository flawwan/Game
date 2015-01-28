<?php

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