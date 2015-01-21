<?php

class User
{
	private $userID = null;
	function __construct()
	{
		if(isset($_SESSION['login'])){
			$this->userID = $_SESSION['login'];
		}
	}
	function loggedIn()
	{
		return $this->userID === null ? false: true;
	}

}
