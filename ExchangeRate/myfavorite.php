<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exrate";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$country = $_POST['convert_iso'];
$id = $_SESSION['id'];

for($x = 0; $x < count($country); $x++)
{ 
	$sql = "INSERT INTO myfavorite (ID, Country)
	VALUES ('$id', '$country[$x]')";

	mysqli_query($conn, $sql);
}

header("Location: personal.php");

$conn->close();
?>