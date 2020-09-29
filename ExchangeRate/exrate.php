<?php
session_start();

$from = $_GET['former'];
$to = $_GET['latter'];
$amount = floatval($_GET['currency']);
$usd = 'USD';

$content=file_get_contents('https://tw.rter.info/capi.php');
$currency=json_decode($content, true);
$one = floatval($currency[$usd.$from]['Exrate']);
$two = floatval($currency[$usd.$to]['Exrate']);
$result = $amount / $one * $two;

if(@$_SESSION['login'] == TRUE)
{
	$servername = "localhost";
	$username = "Tai";
	$password = "bcbbc145879";
	$dbname = "exrate";
	$id = $_SESSION['id'];

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO record (ID, A, B, amount, result)
	VALUES ('$id','$from', '$to', '$amount', '$result')";

	if ($conn->query($sql) === TRUE) 
	{
    	echo "";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

echo $result;
?>