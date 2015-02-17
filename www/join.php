<?php require '../lib/Bootstrap.php'; ?>
<?php
if (!User::loggedIn()) {
	header("location: index.php");
	exit();
}
require '../template/header.php';


$id = intval($_GET['id']);

//check if game exists
$exists = Database::query('SELECT `game_id` FROM `nodes` WHERE `game_id`=:id', array(':id' => $id))->rowCount();

if ($exists == 0) {
	die("game not found");
}
//Check if already in queue, if exists update lastseen.

Database::query("SELECT `matchmaking_id` FROM `matchmaking` WHERE `matchmaking_node`=:node AND `matchmaking_user`=:user", array(
	':user' => User::getUserID(),
	':node' => $id
));

if (Database::rowCount() == 0) {
	//Does not exist in db, create entry
	$key = hash("SHA512", bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)));
	Database::query("INSERT INTO `matchmaking`(`matchmaking_user`, `matchmaking_node`, `matchmaking_key`) VALUES(:user,:node, :key)", array(
		':user' => User::getUserID(),
		':node' => $id,
		':key' => $key
	));
} else {
	//Already in queue, update last seen
	Database::query("UPDATE `matchmaking` SET `matchmaking_last_seen`=NOW() WHERE `matchmaking_node`=:node AND `matchmaking_user`=:user", array(
		':user' => User::getUserID(),
		':node' => $id
	));
}

//Get users in queue
$searching = Database::query("SELECT count(`matchmaking_node`) as `searching` FROM `matchmaking` WHERE `matchmaking_node`=:node AND `matchmaking_last_seen` > DATE_ADD(NOW(), INTERVAL - 5 SECOND) GROUP BY `matchmaking_node`", array(
	':node' => $id
))->fetch()["searching"];
?>
	<p>Players searching right now: <span id="searching"><?= $searching; ?></span></p>
	You are now queue for this game, queue started: <?= date("H:i:s", time()); ?>
	<div class="timer">Time in queue: <span>00:00</span></div>
	<script>
		var id = <?=$id;?>;
	</script>
	<script src="public/js/timer.js"></script>
<?php require '../template/footer.php';

