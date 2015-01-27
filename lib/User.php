<?php

class User
{
	private static $userID = null;
	private static $username = null;

	function __construct()
	{
		if (isset($_SESSION['uid'])) {
			self::$userID = $_SESSION['uid'];
			self::$username = $_SESSION['username'];
		}
	}

	static function loggedIn()
	{
		return self::$userID === null ? false : true;
	}

	static function login($username, $uid)
	{
		$_SESSION['username'] = $username;
		$_SESSION['uid'] = $uid;
		self::$username = $username;
		self::$userID = $uid;
	}

	static function getUser()
	{
		return self::$username;
	}

	static function getUserID()
	{
		return self::$userID;
	}

}
