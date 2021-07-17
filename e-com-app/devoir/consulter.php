<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<title>consultation</title>
</head>
<body bgcolor="bluefff">
<?php session_start();  
if(!$_SESSION)
header('location:index.php');
?>

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
<?php 
$id = $_GET["id"];
$connect = mysqli_connect('localhost','root','','devoir0') or die("Erreur
deconnexion auserveur.");
$result = mysqli_query($connect, "SELECT idparfum, libelle, prix , description, img_adress  from parfum where idparfum =  $id ");

$row = mysqli_fetch_array($result);
 ?>
<center><img align = "center" src="<?php echo $row['img_adress'] ?>"  width = 250 px lenght = 250 px></center>

<p><h2><?php echo $row['libelle'] ?></h2></p>
<p><h4>  prix :  <?php echo $row['prix']; ?>  MAD </h4></p>
<p><b>Description : </b><?php echo $row['description'] ?></p>
<br><br>
<center>
		
		<label>   </label>
		<form action="consulter.php?id=<?php echo $id ?>" method="post" >
			<a class ="btn btn-info " href="Modifier.php?id=<?php echo $id ?>">Modifier</a>
		<input type="submit" class ="btn btn-info " class ="button" name="supprimer" value="supprimer">
		</form>
		<?php 
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer'])){
			supprimer();
		}
		function supprimer(){
$id = $_GET["id"];
$connect = mysqli_connect('localhost','root','','devoir0') or die("Erreur
deconnexion auserveur.");
$result = mysqli_query($connect, "DELETE  FROM parfum WHERE idparfum= $id ");

			if($result)
			header('location:index.php');
		else {

			?>
			<label><?php echo "echec de suppression !"; ?></label>
		<?php
	}

		 }
		 ?>
</center>


</body>
</html>