<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="public/css/foundation.min.css"/>
</head>
<body>
<nav class="top-bar" data-topbar="" role="navigation">

	<ul class="title-area">
		<li class="name">
			<h1><a href="http://5v5.se:90/">5v5</a></h1>
		</li>
		<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>


	<section class="top-bar-section">
		<!-- Right Nav Section -->
		<ul class="right">
			<li class="has-dropdown not-click">
				<a href="#">Controlpanel</a>
				<ul class="dropdown">
					<li><a href="login.php">Login</a></li>
					<?php if (User::loggedIn()):?>
						<li><a href="registerGame.php">Register Game</a></li>
					<?php endif;?>
				</ul>
			</li>
		</ul>
	</section>
</nav>
