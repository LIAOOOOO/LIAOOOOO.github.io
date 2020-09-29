<?php
	session_start();

	$con = new mysqli("localhost", "Tai", "bcbbc145879", "exrate");
	$sql = "SELECT * FROM account";
	if ($con->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

    $result = $con->query($sql);
    $msg = '';
    $_SESSION['fail'] = FALSE;

	if (isset($_POST['login']) && !empty($_POST['id']) && !empty($_POST['password'])) 
	{

		$id = $_POST['id'];
        $password = $_POST['password'];

        while($row = $result->fetch_assoc())
        { 
            if($id == $row['ID'] && $password == $row['Password'])
            {
            	$_SESSION['login'] = TRUE;
            	$_SESSION['name'] = $row['Name'];
				$_SESSION['id'] = $row['ID'];
				$_SESSION['password'] = $row['Password'];
				$_SESSION['email'] = $row['Email'];   
				$_SESSION['phone'] = $row['Phone'];
            }
		}
		if($_SESSION['login'] == TRUE)
            header("Location: index.php");
        else
        {
        	header("Location: login.php");
        	$_SESSION['fail'] = TRUE;
        }
	}
	

    $con->close();
?>