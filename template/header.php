<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="public/css/foundation.min.css"/>
	<script src="public/js/jquery.min.js"></script>
</head>
<body>
<nav class="top-bar" data-topbar="" role="navigation">

	<ul class="title-area">
		<li class="name">
			<h1><a href="index.php">GameCentral</a></h1>
		</li>
		<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>


	<section class="top-bar-section">
		<!-- Right Nav Section -->
		<ul class="right">
			<?php if (User::loggedIn()): ?>
			<li><a>Hej, <?=User::getUser();?>!</a></li><!--Ser ut som skit.. Men orkar inte ändra cssen just nu-->
			<?php endif; ?>
			<li class="has-dropdown not-click">
				<a href="#">Controlpanel</a>
				<ul class="dropdown">

					<?php if (User::loggedIn()): ?>
						<li><a href="games.php">List Games</a></li>
						<li><a href="registerNode.php">Register Game</a></li>
						<li><a href="logout.php">Logout</a></li>
					<?php else: ?>
						<li><a href="login.php">Login</a></li>
					<?php endif; ?>
				</ul>
			</li>
		</ul>
	</section>
</nav>
