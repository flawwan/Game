<?php require '../lib/bootstrap.php'; ?>
<?php require '../template/header.php'; ?>
<?php
$PostUser = '';
$PostPass = '';
#print_r(Database::query('SELECT * FROM `users`', array())->fetchAll());
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$PostUser = $_POST['username'];
	$PostPass = $_POST['password'];
	$data = Database::query('SELECT * FROM `users` WHERE `user_name`=:username AND `user_pass`=:password', array(':username' => $PostUser, ':password' => $PostPass));
	if ($data->rowCount())
	{
		echo 'loged ine';
		$_SESSION['login'] = $data->fetch()['user_id'];
	}

}

?>
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

