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
	<script type="text/javascript">
		function validate(){
			if(document.registration.password.value === document.registration.check.value){
				return true;
			}
			else {
				alert("Passwords did not match")
				return false;
			}
		}
	</script>
	<form name="registration" class='left' method='post'>
		<fieldset>
			<p><?= $status; ?></p>
			<legend>Skapa Användare:</legend>
			<label>Användarnamn:</label>
			<input class='left' type='text' name='username'/>
			<label>Lösenord:</label>
			<input type='password' name='password'/>
			<input type='password' name='check'/>
			<input type='submit' onclick="return validate();" class='button'/>
			<a href="login.php">Logga in</a>
		</fieldset>
	</form>
<?php require '../template/footer.php'; ?>