<?php require '../lib/bootstrap.php'; ?>
<?php require '../template/header.php'; ?>
<?php
Database::query("SELECT * FROM users", array());
?>
<?php require '../template/footer.php'; ?>