<?php session_start(); 
$admin = "admin";
if($_SESSION )
header('location:index.php');
?>
<?php 
$id = $_GET["id"];
			
 $conn = mysqli_connect("localhost","root","","devoir0");

			$n_libelle = mysqli_real_escape_string($conn, $_REQUEST['i_libelle']);
			$n_prix = mysqli_real_escape_string($conn, $_REQUEST['i_prix']);
			$n_desc = mysqli_real_escape_string($conn, $_REQUEST['i_desc']);
			$n_adressimg = mysqli_real_escape_string($conn, $_REQUEST['i_adressimg']);

    

    $sqlR = " UPDATE parfum SET libelle='".$n_libelle."' ,  prix = '".$n_prix."'  , description = '".$n_desc."' , img_adress = '".$n_adressimg."' WHERE idparfum='".$id."'" ;

$done = mysqli_query($conn, $sqlR);

if($done){
	$done = "done";
  header("location:modifier.php?done=$done&id=$id");
} 

else{
	$error = "error";
 header("location:modifier.php?error=$error&id=$id");
  }
			mysqli_close($conn);


 ?>