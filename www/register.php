<?php require '../lib/bootstrap.php'; ?>

<?php
$PostUser = '';
$PostPass = '';
#print_r(Database::query('SELECT * FROM `users`', array())->fetchAll());
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $PostUser = $_POST['username'];
    $PostPass = hash('SHA512', $_POST['password']);
    $test = Database::query('SELECT * FROM `users`', array());
    $user = Database::query('INSERT INTO `users`(`user_name`, `user_pass`) VALUES (:post_name, :post_pass)',
                      array(':post_name' => $PostUser,
                            ':post_pass' => $PostPass
                      ));
    $status = 'User created, ' . $PostUser;
}

?>

<?php require '../template/header.php'; ?>
    <form class='left' method='post'>
        <fieldset>
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