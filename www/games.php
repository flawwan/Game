<?php require '../lib/bootstrap.php'; ?>
<?php
if (!User::loggedIn()) {
	header("location: login.php");
	exit();
}
$nodes = Database::query("SELECT * FROM `nodes`", array())->fetchAll();
?>
<?php require '../template/header.php'; ?>
Click on a game to join the queue.
<?php
foreach ($nodes as $node):?>
	<p>
	<h2><a href="join.php?id=<?=$node["game_id"];?>"><?= $node['game_name']; ?></a></h2>
	</p>
<?php endforeach; ?>
<?php require '../template/footer.php'; ?>
