<?php session_start(); 
$admin = "admin";
if($_SESSION["role"] != $admin )
header('location:index.php');
?>
<?php

session_destroy();
		header('location:index.php');
  ?>