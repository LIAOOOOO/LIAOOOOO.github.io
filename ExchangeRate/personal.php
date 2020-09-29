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

					<h3><font size="10"> My Record</font></h3>
					<table style="width:100%">
					  <tr>
					    <th>From</th>
					    <th>To</th>
					    <th>Amount</th>
					    <th>Result</th>
					  </tr>
					<?php
					$servername = "localhost";
					$username = "Tai";
					$password = "bcbbc145879";
					$dbname = "exrate";

					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) 
					{
					    die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT ID, A, B, amount, result FROM record";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
					    while($row = $result->fetch_assoc()) 
					    {
					    	if($_SESSION['id'] == $row['ID'])
					    	{
					?>
					<tr>
					<?php
					        	echo "<td>".$row['A']."</td><td>".$row['B']."</td><td>".$row['amount']."</td><td>".$row['result']. "</td><br>";
					        }
					    }
					?>
					</tr>
					<?php
					} 
			
					$conn->close();

					?>
					</table>


				</div>
			
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>