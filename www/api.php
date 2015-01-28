<?php require '../lib/bootstrap.php'; ?>
<?php
if (!User::loggedIn()) { //Cant register if logged in
	die("null");
}
header('Content-Type: application/json');
$node = $_GET['id'];
echo json_encode(Database::query("SELECT * FROM `matchmaking`
 								  LEFT JOIN `nodes` ON `nodes`.`game_id`=`matchmaking`.`matchmaking_node`
 								  WHERE `matchmaking_user`=:user AND `matchmaking_node`=:node", array(':node' => $node, ':user' => User::getUserID()))->fetch());