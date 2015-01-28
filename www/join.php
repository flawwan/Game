<?php require '../lib/Bootstrap.php'; ?>
<?php
if (!User::loggedIn()) {
	header("location: index.php");
	exit();
}
require '../template/header.php';

//check if game exists
$exists = Database::query('SELECT `game_id` FROM `nodes` WHERE `game_id`=:id', array(':id' => $_GET['id']))->rowCount();

if ($exists == 0) {
	die("game not found");
}
//Check if already in queue, if exists update lastseen.

Database::query("SELECT `matchmaking_id` FROM `matchmaking` WHERE `matchmaking_node`=:node AND `matchmaking_user`=:user", array(
	':user' => User::getUserID(),
	':node' => $_GET['id']
));
if (Database::rowCount() == 0) {
	//Does not exist in db
	$key = hash("SHA512", bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)));
	Database::query("INSERT INTO `matchmaking`(`matchmaking_user`, `matchmaking_node`, `matchmaking_key`) VALUES(:user,:node, :key)", array(
		':user' => User::getUserID(),
		':node' => $_GET['id'],
		':key' => $key
	));
} else {
	Database::query("UPDATE `matchmaking` SET `matchmaking_last_seen`=NOW() WHERE `matchmaking_node`=:node AND `matchmaking_user`=:user", array(
		':user' => User::getUserID(),
		':node' => $_GET['id']
	));
}
?>
	You are now queing for this game, queue started: <?= date("H:i:s", time()); ?>

	<script>
		var interval = setInterval(function () {
			$.get("api.php?id=<?=$_GET['id'];?>", function (resp) {
				if (resp.matchmaking_status == "active") {
					//Redirect to game
					clearInterval(interval);
					window.location = resp.game_play_url + "?key=" + resp.matchmaking_key
				}
			});
		}, 3000); //check every 2 seconds for match
	</script>
<?php require '../template/footer.php';
