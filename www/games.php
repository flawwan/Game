<?php require '../lib/Bootstrap.php';
if (!User::loggedIn()) {
	header("location: login.php");
	exit();
}
$nodes = Database::query("SELECT * FROM `nodes` LEFT JOIN `users` ON `nodes`.`game_creator`=`users`.`user_id`", array())->fetchAll();


require '../template/header.php'; ?>
Click on a game to join the queue.
<?php
foreach ($nodes as $node):?>
<?php $searching = (int)Database::query("SELECT count(`matchmaking_node`) as `searching` FROM `matchmaking` WHERE `matchmaking_node`=:node AND `matchmaking_last_seen` > DATE_ADD(NOW(), INTERVAL - 5 SECOND) GROUP BY `matchmaking_node`", array(
		':node' => $node["game_id"]
	))->fetch()["searching"];?>
	<p>
	<h2><a href="join.php?id=<?=$node["game_id"];?>"><?= htmlspecialchars($node['game_name'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
	<p>In queue: <?=$searching?> | Created by: <?=$node["user_name"]." ";?>
	<?=User::getUserID() == $node["user_id"] ? "<a href='editNode.php".$node['game_id']."'>edit</a>" : ""?>
	</p>
<?php endforeach; ?>
<?php require '../template/footer.php'; ?>