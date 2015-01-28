<?php require '../lib/Bootstrap.php'; ?>
<?php require '../template/header.php'; ?>
<?php
if (User::loggedIn())
{
    echo "<h2>Välkommen</h2>";
}
else
{
    echo "<h2>Välj ett spel, eller logga in och skapa ditt eget</h2>";
}
?>
<?php require '../template/footer.php'; ?>
