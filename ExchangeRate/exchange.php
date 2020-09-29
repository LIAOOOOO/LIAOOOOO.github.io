<?php
session_start();
?>
<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Currency Calculator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link href="css/flag-icon.css" rel="stylesheet">
        <script>
 		function cal() 
		{
		    var num = $("#num").val();
		    var from = $("#from").val();
		    var to = $("#to").val();
		    $.ajax({
		    			url: "exrate.php",
		    			data: 
		    			{
		    				currency: num,
		    				former: from,
		    				latter: to
		    		    },
		    			type: "GET",
		    			datatype: "html",
		    		    success: function( output ) 
		    		    {
		    			   $( "#out" ).html(output);
		    		    }
		    	   });
		    $("#num").val("");
	   }
       </script>
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

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2><strong></strong>Choose currency</h2>
					</header>
					 <center>
     <form class="form-search" action="exrate.php" method="post">
        <p class=line40> <select id="from" name="from" >
        <option value="TWD"  selected = selected>TWD 台幣</option>
              <option value="USD" >USD 美金</option>
<option value="CNY" title="images/https://tw.rter.info/images/Flag_of_Japan.png">CNY 人民幣</option>
<option value="JPY" title="images/https://tw.rter.info/images/Flag_of_Japan.png">JPY 日圓</option>
<option value="HKD" >HKD 港幣</option>
<option value="EUR" >EUR 歐元 </option>
<option value="GBP" >GBP 英鎊</option>
<option value="AUD" >AUD 澳幣</option>
<option value="CAD" >CAD 加拿大幣</option>
<option value="SGD" >SGD 新加坡幣</option>
<option value="CHF" >CHF瑞士法郎</option>
<option value="SEK" >SEK 瑞典幣</option>
<option value="NZD" >NZD 紐元</option>
<option value="THB" >THB 泰幣</option>
<option value="PHP" >PHP 菲國比索</option>
<option value="IDR" >IDR 印尼幣</option>
<option value="KRW" >KRW 韓元</option>
<option value="VND" >VND 越南盾</option>
<option value="MYR" >MYR 馬來幣</option>
</select>
 <br>
<font size="5">Convert into</font><br><br>
  
      <select  id="to" name="to" >
        <option value="TWD" >TWD 台幣</option>
         <option value="USD" >USD 美金</option>
<option value="CNY" >CNY 人民幣</option>
<option value="JPY"  selected = selected >JPY 日圓</option>
<option value="EUR" >EUR 歐元 </option>
<option value="HKD" >HKD 港幣</option>
<option value="GBP" >GBP 英鎊</option>
<option value="AUD" >AUD 澳幣</option>
<option value="CAD" >CAD 加拿大幣</option>
<option value="SGD" >SGD 新加坡幣</option>
<option value="CHF" >CHF瑞士法郎</option>
<option value="SEK" >SEK 瑞典幣</option>
<option value="NZD" >NZD 紐元</option>
<option value="THB" >THB 泰幣</option>
<option value="PHP" >PHP 菲國比索</option>
<option value="IDR" >IDR 印尼幣</option>
<option value="KRW" >KRW 韓元</option>
<option value="VND" >VND 越南盾</option>
<option value="MYR" >MYR 馬來幣</option>
 

</select>
      <br><br>


 <p><font size="5">Exchange amount </font><br>
 	<input name="num" id="num" type="text" maxlength="10" delay="0" value="100" class="input_02" /> <br>
 
 	<input type = "button" id = "exchange" name = "exchange" value = "Start" onclick = "cal()">
      <!--<p class=bn>-->
      </form>
      <div style="font-size:35px" id="out"></div>
  </center> 
      
      <script>


</script>
					<div class="navbar-collapse collapse">

		</section>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>