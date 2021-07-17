<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<?php session_start(); ?>
	<title>Acueil</title>
</head>
<body bgcolor="bluefff">
	<div class="fixed-top">
	 <?php 
			if($_SESSION)
			echo '<h5 class=" alert alert-light mb-0 text-center p-0" >Bienvenue Mr/Mlle '.$_SESSION["login"].'</h5>';
	 	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-0">
 
	 	<dir class="mx-auto">
	    <ul class="navbar-nav mr-auto">
	   
	      
	      <li class="nav-item active ">
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
	</nav></div>';
	}
		
	else
		echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
	</ul>
	</dir>
	</nav></div>';
	 ?>
<br><br><br>
<br>
<?php

$connect = mysqli_connect('localhost','root','','devoir0') or die("Erreur
deconnexion auserveur.");
$result = mysqli_query($connect, "SELECT idparfum, libelle, prix , description, img_adress  from parfum");
while ( $row = mysqli_fetch_array($result)){
	?>
<br>
<img align ="left" src="<?php echo $row['img_adress'] ?>"  width = 200 px lenght = 200 px>
<br>
<h2 align="center"><?php echo $row['libelle'] ?></h2>
<h4 align="center" >  prix :  <?php echo $row['prix'] ?>  MAD </h4>
<br>
<?php
if($_SESSION){?>
<div align="center" ><a class ="btn btn-info " href="consulter.php?id=<?php echo $row['idparfum'] ?>">Consulter</a></div>

<?php 
}
else{
?>
<br>
<?php
} 
?>
<br><br><br><hr>
<?php
}
mysqli_close($connect);
?>

</body>
</html>