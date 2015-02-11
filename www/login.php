<?php
require '../lib/Bootstrap.php';
if (User::loggedIn()) { //Cant register if logged in
	header("location: index.php");
	exit();
}
$status = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$postUser = $_POST['username'];
	$postPass = hash('SHA512', $_POST['password']);
	$user = Database::query('SELECT * FROM `users` WHERE `user_name`=:username AND `user_pass`=:password', array(':username' => $postUser, ':password' => $postPass));
	if ($user->rowCount()) {
		$userInfo = $user->fetch();
		User::login($userInfo['user_name'], $userInfo['user_id']);
		header('location: index.php');
		exit();
	} else {
		$status = "Could not login. Wrong username/pass";
	}
}
require '../template/header.php'; ?>
<form class='left' method='post'>
	<fieldset>
		<?= $status; ?>
		<legend>Logga in:</legend>
		<label>Användarnamn:</label>
		<input type='text' name='username'/>
		<label>Lösenord:</label>
		<input type='password' name='password'/>
		<input type='submit' class='button'/>
		<a href="register.php">Skapa Användare</a>
	</fieldset>
</form>
<?php require '../template/footer.php'; ?>