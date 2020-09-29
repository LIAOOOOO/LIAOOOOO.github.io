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
						<a href="signup.php">Sing up</a>
						<a href="login.php">Log in</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2><strong></strong>Sing up</h2>
					</header>
					<form action="register2.php" method="POST">
						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="UserID">UserID</label>
							<input name="id" id="id" type="text" placeholder="ID">
						</div>
						<div class="field half first">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field half">
							<label for="phone">Phone</label>
							<input name="phone" id="phone" type="text" placeholder="Phone">
						</div>
						<div class="field half first">
							<label for="">Password</label>
							<input name="password" id="password" placeholder="Password" type="text">
						</div>
						<div class="actions">
							<center>
								<input type="submit" class="button" value="register">
								<div id="out"><?php if(@$_SESSION['exist'] == TRUE)
													{
													 	echo "Exist ID";
													 	$_SESSION['exist'] = FALSE;
													}
								              ?>					
								</div>
							</center>
							
						</div>
					</form>
      
   

</script>
					<div class="navbar-collapse collapse">

		</section>

		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>