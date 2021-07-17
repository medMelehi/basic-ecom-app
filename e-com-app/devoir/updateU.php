<?php

$id = $_GET["id"];
			
 $conn = mysqli_connect("localhost","root","","devoir0");

			$n_login = mysqli_real_escape_string($conn, $_REQUEST['i_login']);
			$n_password = mysqli_real_escape_string($conn, $_REQUEST['i_password']);
			$n_role = mysqli_real_escape_string($conn, $_REQUEST['i_role']);
			

    

    $sqlR = " UPDATE user SET login='".$n_login."' ,  password = '".$n_password."'  , role = '".$n_role."'  WHERE iduser ='".$id."'" ;

$done = mysqli_query($conn, $sqlR);

if($done){
	$done = "done";
  header("location:updateUser.php?done=$done&id=$id");
} 

else{
	$error = "error";
 header("location:updateUser.php?error=$error&id=$id");
  }
			mysqli_close($conn);
?>