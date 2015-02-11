<?php require '../lib/Bootstrap.php';

if (User::loggedIn()) { //Cant register if logged in
	header("location: index.php");
	exit();
}

$status = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$postUser = $_POST['username'];
	$postPass = hash('SHA512', $_POST['password']);
	//Check if user exists
	$exists = Database::query("SELECT `user_id` FROM `users` WHERE `user_name`=:post_name", array(
		'post_name' => $postUser
	))->rowCount();
	if ($exists == 1) {
		$status = "Username already exists!";
	} else {
		$user = Database::query('INSERT INTO `users`(`user_name`, `user_pass`) VALUES (:post_name, :post_pass)',
			array(':post_name' => $postUser,
				':post_pass' => $postPass
			)
		);
		//redirect to login
		header("location: login.php");
		exit();
	}
}

require '../template/header.php'; ?>
	<form class='left' method='post'>
		<fieldset>
			<p><?= $status; ?></p>
			<legend>Skapa Användare:</legend>
			<label>Användarnamn:</label>
			<input class='left' type='text' name='username'/>
			<label>Lösenord:</label>
			<input type='password' name='password'/>
			<input type='submit' class='button'/>
			<a href="login.php">Logga in</a>
		</fieldset>
	</form>
<?php require '../template/footer.php'; ?>