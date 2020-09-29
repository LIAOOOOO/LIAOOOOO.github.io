<?php
   session_start();
   unset($_SESSION['login']);
   unset($_SESSION['name']);
   unset($_SESSION['id']);
   unset($_SESSION['password']);
   unset($_SESSION['email']);
   unset($_SESSION['phone']);
   unset($_SESSION['fail']);
   unset($_SESSION['exist']);
   header("Location: index.php"); 
?>