<?php
require '../config/db.php';

class Database
{
	private static $init = false;
	/* @var $dbhandeler PDO */
	private static $dbhandler = null;
	/* @var $sth PDOStatement */
	private static $sth = null;

	private static function connectDatabase()
	{
		$dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEBUG //TODO
		$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		self::$init = true;
		self::$dbhandler = $dbh;
	}

	public static function db()
	{
		if (self::$init == true) {
			return self::$dbhandler;
		}
		try {
			self::connectDatabase();
		} catch (PDOException $e) {
			die("DB failed!");
		}
		return self::$dbhandler;
	}

	public static function begin()
	{
		self::db()->beginTransaction();
	}

	public static function commit()
	{
		self::db()->commit();
	}

	public static function query($sql, $params)
	{
		self::$sth = self::db()->prepare($sql);
		self::$sth->execute($params);
		return self::$sth;
	}


	public static function fetch()
	{
		return self::fetch(PDO::FETCH_ASSOC);
	}

	public static function rowCount()
	{
		return self::$sth->rowCount();
	}

	public static function lastInsertId()
	{
		return self::db()->lastInsertId();
	}

	public static function rollback()
	{
		self::db()->rollBack();
	}

	public static function fetchAll()
	{
		return self::fetchAll(PDO::FETCH_ASSOC);
	}
}