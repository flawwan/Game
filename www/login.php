<?php require '../lib/bootstrap.php'; ?>

<?php
$PostUser = '';
$PostPass = '';
#print_r(Database::query('SELECT * FROM `users`', array())->fetchAll());
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$PostUser = $_POST['username'];
	$PostPass = $_POST['password'];
	$user = Database::query('SELECT * FROM `users` WHERE `user_name`=:username AND `user_pass`=:password', array(':username' => $PostUser, ':password' => $PostPass));
	if ($user->rowCount()) {
		$userInfo = $user->fetch();
		User::login($userInfo['user_id'], $userInfo['user_name']);
	}

}

?>

<?php require '../template/header.php'; ?>
<form class='left' method='post'>
	<fieldset>
		<legend>Logga in:</legend>
		<label>Användarnamn:</label>
		<input type='text' name='username'/>
		<label>Lösenord:</label>
		<input type='password' name='password'/>
		<input type='submit' class='button'/>
</form>
<?php require '../template/footer.php'; ?>

