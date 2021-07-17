<?php 
session_start(); 
$admin = "admin";
if($_SESSION["role"] != $admin )
header('location:index.php');
?>

<?php 

$conn = mysqli_connect("localhost","root","","devoir0");

			$n_login = mysqli_real_escape_string($conn, $_REQUEST['i_login']);
			$n_password = mysqli_real_escape_string($conn, $_REQUEST['i_password']);
			$n_role = mysqli_real_escape_string($conn, $_REQUEST['i_role']);

	$sqlR1 = "SELECT * FROM user WHERE login = '$n_login' ";
     
     $sqlR = "INSERT INTO user (login , password , role) VALUES ('$n_login', '$n_password' ,'$n_role') ";

$exist = mysqli_query($conn, $sqlR1);
$row = mysqli_fetch_array($exist);

if(empty($n_login) || empty($n_password) ||empty($n_role)){
	header('location:users.php?error2');
}
else{
	if($row)
	
	header('location:users.php?error');
	else{
			if(mysqli_query($conn, $sqlR)){ 
			mysqli_close($connect);
			header('location:users.php?done');}
			else
			header('location:users.php?error2');
	}
}


 ?>