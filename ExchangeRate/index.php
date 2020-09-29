<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Currency Calculator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link href="css/flag-icon.css" rel="stylesheet">
	</head>
	<body>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong>Currency Calculator <span class="fa fa-calculator"></span></strong></a>
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="exchange.php">Converter</a>
						<a href="rate.php">Today's Rate</a>

						<?php 
							  if(@$_SESSION['login'] == FALSE)
							  { 
						?>
						<a href="register.php">Sing up</a>
						<a href="login.php">Log in</a>
						<?php
							  }
							  else
							  {
						?>
						<a href="personal.php"><li class="fa fa-user fa-2x"><font face="Trebuchet MS"> Hi,<?php echo $_SESSION['id']; ?></font></li></a>
						<a href="logout.php">Log out</a>
						<?php
						      }
						?>

					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Currency Calculator</h1>
					</header>
					<div class="flex ">
						<div>
							<span class="fa flag-icon flag-icon-tw fa-5x"></span>
							<h3>TWD</h3>
						</div>
						<div>
							<span class="fa fa-refresh fa-spin fa-5x fa-fw"></span>
							<h3>convert to</h3>
						</div>
						<div>
							<span class="fa flag-icon flag-icon-us fa-5x"></span>
							<h3>Another  currency</h3>
						</div>
					</div>
					<footer>
						<a href="exchange.php" class="button">Get Started</a>
					</footer>
				</div>
			</section>

		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>