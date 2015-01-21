<?php require '../lib/bootstrap.php'; ?>
<?php require '../template/header.php'; ?>
<?php
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

