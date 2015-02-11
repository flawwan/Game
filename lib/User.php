<?php

class User
{
	private static $userID = null;
	private static $username = null;

	public function __construct()
	{
		if (isset($_SESSION['uid'])) {
			self::$userID = $_SESSION['uid'];
			self::$username = $_SESSION['username'];
		}
	}

	public static function loggedIn()
	{
		return self::$userID === null ? false : true;
	}

	public static function login($username, $uid)
	{
		$_SESSION['username'] = $username;
		$_SESSION['uid'] = $uid;
		self::$username = $username;
		self::$userID = $uid;
	}

	public static function getUser()
	{
		return self::$username;
	}

	public static function getUserID()
	{
		return self::$userID;
	}
}
