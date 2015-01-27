<?php require '../lib/bootstrap.php'; ?>
<?php
if (!User::loggedIn()) {
	header("location: index.php");
	exit();
}

//Check if already in queue, if exists update lastseen.

Database::query("SELECT `matchmaking_id` FROM `matchmaking` WHERE `matchmaking_node`=:node AND `matchmaking_user`=:user", array(
	':user' => User::getUserID(),
	':node' => $_GET['id']
));
if (Database::rowCount() == 0) {
	//Does not exist in db
	Database::query("INSERT INTO `matchmaking`(`matchmaking_user`, `matchmaking_node`) VALUES(:user,:node)", array(
		':user' => User::getUserID(),
		':node' => $_GET['id']
	));
} else {
	Database::query("UPDATE `matchmaking` SET `matchmaking_last_seen`=NOW() WHERE `matchmaking_node`=:node AND `matchmaking_user`=:user", array(
		':user' => User::getUserID(),
		':node' => $_GET['id']
	));
}

echo "You are now queing for this game, queue started: " . date("H:i:s", time());