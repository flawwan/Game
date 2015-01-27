<?php require '../lib/bootstrap.php'; ?>
<?php
if (User::loggedIn() === false) {
	header("location: login.php");
	exit();
}

$status = '';
$USER_ID = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$postUrl = $_POST['nodeUrl'];
	$gameName = $_POST['gameName'];
	$gamePlayers = $_POST['gamePlayers'];
	$uniqueKey = hash('SHA512', $postUrl . $gameName . bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)));
	Database::query('INSERT INTO `nodes`(`game_post_url`,`game_name`, `game_creator`,`game_unique_hash`,`game_players`) VALUES(:post_url, :game_name,:user_id,:game_hash,:game_players)',
		array(':post_url' => $postUrl,
			':game_name' => $gameName,
			':user_id' => $USER_ID,
			':game_hash' => $uniqueKey,
			':game_players' => $gamePlayers
		));
	$status = 'Node created, game private key: ' . $uniqueKey;
}

?>
<?php require '../template/header.php'; ?>
	<p><?= $status; ?></p>
	<form action="" method="post">
		<fieldset>
			<legend>Register Game</legend>

			<label>Game Name:
				<input type="text" name="gameName" placeholder="Game name">
			</label>
			<label>Post URL:
				<input type="text" name="nodeUrl" placeholder="Enter node post url here">
			</label>
			<label>Game Players:
				<input type="text" name="nodeUrl" placeholder="Enter amount of min=max players for this game">
			</label>
			<input type="submit" class="button"/>
		</fieldset>
	</form>

<?php require '../template/footer.php'; ?>