<?php
session_start();

$usd = 'USD';

$content=file_get_contents('https://tw.rter.info/capi.php');
$currency=json_decode($content, true);
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
					<a href="index.html" class="logo"><strong>Currency Calculator <span class="fa fa-calculator"></span></strong></a>
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

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2><strong></strong>Exchange rate</h2>
					</header>
					 <center>
					 	<form>
					 		<table border="1">
					 			<tr>
					 				<th>Currency</th>
					 				<th>Exchange rate</th>
					 			</tr>
					 			<tr>
					 				<td><label for="TWD" ><span class="fa flag-icon flag-icon-tw fa-1x"></span>台幣 (TWD)</label></td>
					 				<td><?php echo $currency[$usd."TWD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="USD"><span class="fa flag-icon flag-icon-us fa-1x"></span>美金 (USD)</label></td>
					 				<td><?php echo $currency[$usd."USD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="CNY" ><span class="fa flag-icon flag-icon-cn fa-1x"></span>人民幣 (CNY)</label></td>
					 				<td><?php echo $currency[$usd."CNY"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="EUR" ><span class="fa flag-icon flag-icon-eu fa-1x"></span>歐元 (EUR)</label></td>
					 				<td><?php echo $currency[$usd."EUR"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="HKD" ><span class="fa flag-icon flag-icon-hk fa-1x"></span>港幣 (HKD)</label></td>
					 				<td><?php echo $currency[$usd."HKD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="GBP" ><span class="fa flag-icon flag-icon-gb fa-1x"></span>英鎊 (GBP)</label></td>
					 				<td><?php echo $currency[$usd."GBP"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="AUD" ><span class="fa flag-icon flag-icon-au fa-1x"></span>澳幣 (AUD)</label></td>
					 				<td><?php echo $currency[$usd."AUD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="CAD" ><span class="fa flag-icon flag-icon-ca fa-1x"></span>加拿大幣 (CAD)</label></td>
					 				<td><?php echo $currency[$usd."CAD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="SGD" ><span class="fa flag-icon flag-icon-sg fa-1x"></span>新加坡幣 (SGD)</label></td>
					 				<td><?php echo $currency[$usd."SGD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="CHF" ><span class="fa flag-icon flag-icon-ch fa-1x"></span>瑞士法郎 (CHF)</label></td>
					 				<td><?php echo $currency[$usd."CHF"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="SEK" ><span class="fa flag-icon flag-icon-se fa-1x"></span>瑞典幣 (SEK)</label></td>
					 				<td><?php echo $currency[$usd."SEK"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="NZD" ><span class="fa flag-icon flag-icon-nz fa-1x"></span>紐幣 (NZD)</label></td>
					 				<td><?php echo $currency[$usd."NZD"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="THB" ><span class="fa flag-icon flag-icon-th fa-1x"></span>泰銖 (THB)</label></td>
					 				<td><?php echo $currency[$usd."THB"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="PHP" ><span class="fa flag-icon flag-icon-ph fa-1x"></span>菲律賓比索 (PHP)</label></td>
					 				<td><?php echo $currency[$usd."PHP"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="IDR" ><span class="fa flag-icon flag-icon-id fa-1x"></span>印尼盾 (IDR)</label></td>
					 				<td><?php echo $currency[$usd."IDR"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="KRW" ><span class="fa flag-icon flag-icon-kr fa-1x"></span>韓元 (KRW)</label></td>
					 				<td><?php echo $currency[$usd."KRW"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="VND" ><span class="fa flag-icon flag-icon-vn fa-1x"></span>越南盾 (VND)</label></td>
					 				<td><?php echo $currency[$usd."VND"]['Exrate'] ?></td>
					 			</tr>
					 			<tr>
					 				<td><label for="MYR" ><span class="fa flag-icon flag-icon-my fa-1x"></span>馬來幣 (MYR)</label></td>
					 				<td><?php echo $currency[$usd."MYR"]['Exrate'] ?></td>
					 			</tr>

					 		</table>
     
      </form></center> 
      

					<div class="navbar-collapse collapse">

		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>