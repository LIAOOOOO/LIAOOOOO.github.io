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
	<body class="subpage">
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong>Currency Calculator <span class="fa fa-calculator"></span></strong></a>
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="exchange.php">Converter</a>
						<a href="rate.php">Today's Rate</a>
						<a href="register.php">Sing up</a>
						<a href="login.php">Log in</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2><strong></strong>Log in</h2>
					</header>
					<form action="login2.php" method="post">
						<div class="field half">
							<label for="UserID">UserID</label>
							<input name="id" id="id" type="text" placeholder="ID">
						</div>
						<div class="field half first">
							<label for="">Password</label>
							<input input type="password" name="password" placeholder="Password">
						</div>
						<div class="actions">
							<center>
								<input name="login" id="login" type="submit" class="button" value="Log in">
								<div id="out"><?php if(@$_SESSION['fail'] == TRUE)
													{
													 	echo "Wrong ID or password";
													 	$_SESSION['fail'] = FALSE;
													}
								              ?>					
								</div>
							</center>
							
						</div>
					</form>
      
					<div class="navbar-collapse collapse">

		</section>

		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>