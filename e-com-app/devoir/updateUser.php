<?php session_start(); 
$admin = "admin";
if($_SESSION["role"] != $admin )
header('location:index.php');
?>

<?php 
$id=$_GET["id"];

$connect = mysqli_connect('localhost','root','','devoir0') or die("Erreur
deconnexion auserveur.");
$result = mysqli_query($connect, "SELECT login, password , role from user where iduser =  $id ");

$row = mysqli_fetch_array($result);
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<title></title>
</head>
<body bgcolor="bluefff">

	 <?php 
			if($_SESSION)
			echo '<h5 class=" alert alert-light mb-0 text-center p-0" >Bienvenue Mr/Mlle '.$_SESSION["login"].'</h5>';
	 	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-0">
 
	 	<dir class="mx-auto">
	    <ul class="navbar-nav mr-auto">
	   
	      
	      <li class="nav-item ">
	        <a class="nav-link" href="index.php">Accueil</a>
	      </li>
	      <?php 
	if($_SESSION){
	echo '<li class="nav-item"><a class="nav-link" href="ajouter.php">Ajouter</a></li>';
	if($_SESSION["role"] == "admin")
	echo '  <li class="nav-item"><a class="nav-link" href="users.php">Utilisateurs</a></li>';
	echo '  <li class="nav-item"><a class="nav-link" href="logout.php">Deconnexion</a></li>
	</ul>
	</dir>
	</nav>';
	}
		
	else
		echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
	</ul>
	</dir>
	</nav>';
	 ?>
<hr>


<center>
	<div id="formedit" >
	<h3>modification de l'utilisateur <?php echo $row['login']; ?></h3>
<form action="updateU.php?id=<?php echo $id ?>" method="post">
<table   cellpadding="10" >
	<tr>
    <th>Login :</th>
    <th><input type="text" name="i_login" placeholder="entrez le login" value="<?php echo $row['login']?>"></th>
  </tr>
  <tr>
    <th>Password :</th>
    <th><input type="text" name="i_password" placeholder="entrez le password" value="<?php echo $row['password']?>"></th>
  </tr>
  <tr>
    <th>Role :</th>
    <th><input type="text" name="i_role" placeholder="entrez le role" value="<?php echo $row['role']?>"></th>
  </tr>
</table>
<br>
<input class ="btn btn-info " type="submit" value="modifier"  >
<a class ="btn btn-info " href="users.php">Annuler</a>
</form>
</div>

<br><br>
<?php
                $msg = "";
                if(isset($_GET['error'])){
                    $msg = "un probleme est survenu, veuillez remplir les champs correctement ";
                    echo '<div>'.$msg.'</div>';
                }else if(isset($_GET['done'])){
                    $msg = "les information de l'utilisateur ont été bien modifié";
                    echo '<div>'.$msg.'</div>';
                }
            ?>



</center>

</body>
</html>

