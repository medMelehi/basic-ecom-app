
<?php session_start(); 
$admin = "admin";
if($_SESSION["role"] != $admin )
header('location:index.php');
?>

<?php 
$id=$_GET["id"];
echo $id;

$connect = mysqli_connect('localhost','root','','devoir0') or die("Erreur
deconnexion auserveur.");
$result = mysqli_query($connect, "DELETE  FROM user WHERE iduser= $id ");

			if($result)
			header('location:users.php');


mysqli_close($connect);
 ?>