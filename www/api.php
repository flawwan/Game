<?php require '../lib/Bootstrap.php'; ?>
<?php
header('Content-Type: application/json');
if (!User::loggedIn()) {
	echo json_encode(["status" => false]);
	die;
}
$node = $_GET['id'];
echo json_encode(Database::query("SELECT * FROM `matchmaking`
 								  LEFT JOIN `nodes` ON `nodes`.`game_id`=`matchmaking`.`matchmaking_node`
 								  WHERE `matchmaking_user`=:user AND `matchmaking_node`=:node", array(':node' => $node, ':user' => User::getUserID()))->fetch());