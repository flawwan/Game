<?php require '../lib/Bootstrap.php'; ?>
<?php
if (User::loggedIn() === false) {
    header("location: login.php");
    exit();
}
$status = '';
$USER_ID = User::getUserID();
$spelid = intval($_GET['id']);
$old = Database::query('SELECT * FROM `nodes` WHERE `game_creator`=:game_creator AND `game_id`=:game_id',
    array(":game_creator" => $USER_ID,
        ":game_id" => $spelid))->fetch();
if ($old['game_creator'] != $USER_ID && $old['game_id'] != $spelid) {
    header("location: games.php");
    exit();
}
$oldGameName = $old['game_name'];
$oldNodeUrl = $old['game_post_url'];
$oldPlayUrl = $old['game_play_url'];
$oldGamePlayers = $old['game_players'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postUrl = $_POST['nodeUrl'];
    $gameName = $_POST['gameName'];
    $gamePlayers = $_POST['gamePlayers'];
    $gamePlay = $_POST['playUrl'];
    Database::query('UPDATE `nodes` SET `game_post_url`=:post_url, `game_name`=:game_name, `game_players`=:game_players, `game_play_url`=:play_url
					WHERE `game_id`=:game_id',
        array(':post_url' => $postUrl,
            ':game_name' => $gameName,
            ':game_id' => $spelid,
            ':game_players' => $gamePlayers,
            ':play_url' => $gamePlay
        ));

}

?>
<?php require '../template/header.php'; ?>
    <p><?= $status; ?></p>
    <form action="" method="post">
        <fieldset>
            <legend>Register Game</legend>

            <label>Game Name:
                <input type="text" name="gameName" value="<?= $oldGameName ?>">
            </label>
            <label>Server Post URL:
                <input type="text" name="nodeUrl" value="<?= $oldNodeUrl ?>">
            </label>
            <label>Play Url:
                <input type="text" name="playUrl" value="<?= $oldPlayUrl ?>">
            </label>
            <label>Game Players:
                <input type="text" name="gamePlayers" value="<?= $oldGamePlayers ?>">
            </label>
            <input type="submit" class="button"/>
        </fieldset>
    </form>

<?php require '../template/footer.php'; ?>