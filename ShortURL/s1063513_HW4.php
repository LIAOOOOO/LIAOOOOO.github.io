<?php
$url = $_GET['name'];

if ($url != "")
{
	$rewrite = "";
	for ($i = 0;$i < 5;$i++)
		$rewrite.= sha1($url)[$i];

$url = crc32($url);
$result = sprintf("%u",$url);
  $shortUrl = '';
  while (TRUE) {
    $s = $result % 62; //为什么需要除以62？  26个英文字母 大小写 + 10个数字 = 62
    $shortUrl .= $s > 9 ? $s < 35 ? chr($s + 55) : chr($s + 61) : $s;
    if (($result = floor($result / 62)) == 0) break;
  }
  
$url = $_GET['name'];

$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "reurl";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}
    //$shortUrl = url_short($_POST['url']);

	$sql = "INSERT INTO reurl (url, value)
			VALUES ('$url', '$shortUrl')";
    /*
	if ($conn->query($sql) === TRUE) 
	{
		echo "http://localhost/" .$shortUrl;
	}
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();*/

    $insert = $conn->query($sql); 
    //$sql = " SELECT url FROM reurl WHERE value = '".$val."' ";
	$sql2 = "SELECT url, value FROM reurl";
	$result = $conn->query($sql2);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
	        if ($url == $row['url'])
	        	echo "http://localhost/".$row['value'];
	    }
	}
	else if ($insert === TRUE) 
	{
		echo "http://localhost/".$rewrite;
	}
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>


         