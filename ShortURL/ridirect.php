<?php
$val = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reurl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = " SELECT url FROM reurl WHERE value = '".$val."' ";
$result = $conn->query($sql);
$url = $result->fetch_assoc()['url'];
$conn->close();

header("Location: ".$url); 
?>