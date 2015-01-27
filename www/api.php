<?php require '../lib/bootstrap.php'; ?>
<?php
if (!User::loggedIn()) { //Cant register if logged in
	die("{}");
}

