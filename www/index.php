<?php
require '../lib/Bootstrap.php';
require '../template/header.php';
if (User::loggedIn()) {
	echo "<h2>Välkommen</h2>";
} else {
	echo "<h2>Välj ett spel, eller logga in och skapa ditt eget</h2>";
}
require '../template/footer.php';