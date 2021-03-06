<?php require '../lib/Bootstrap.php';
header('Content-Type: application/json');
if (!User::loggedIn()) {
	echo json_encode(["status" => false]);
	exit();
}
$node = intval($_GET['id']);

//Update last seen
Database::query("UPDATE `matchmaking` SET `matchmaking_last_seen`=NOW() WHERE `matchmaking_user`=:user AND `matchmaking_node`=:node",
	array(':user' => User::getUserID(),
		':node' => $node));

//Get players searching
$searching = Database::query("SELECT count(`matchmaking_node`) as `searching` FROM `matchmaking` WHERE `matchmaking_node`=:node AND `matchmaking_last_seen` > DATE_ADD(NOW(), INTERVAL -5 SECOND) GROUP BY `matchmaking_node`", array(
	':node' => $node
))->fetch()["searching"];

$data = Database::query("SELECT `matchmaking_last_seen`, `matchmaking_status`,`matchmaking_id`,`matchmaking_key`,`game_play_url` FROM `matchmaking`
 								  LEFT JOIN `nodes` ON `nodes`.`game_id`=`matchmaking`.`matchmaking_node`
 								  WHERE `matchmaking_user`=:user AND `matchmaking_node`=:node", array(':node' => $node, ':user' => User::getUserID()))->fetch();
echo json_encode(array("data" => $data,
	"searching" => $searching
));
//Found match delete from db
if ($data['matchmaking_status'] == 'active') {
	Database::query("DELETE FROM `matchmaking` WHERE `matchmaking_id`=:id", array(':id' => $data['matchmaking_id']));
}