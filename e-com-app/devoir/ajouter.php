<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<title>ajouter</title>
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
	  
<center>
<h3>entrez les informatios du nouveau parfum :</h3>

<form action="ajouter.php" method="post" >


<table   cellpadding="10" >
	<tr>
    <th>Libellé :</th>
    <th><input class="form-control"type="text" name="i_libelle" placeholder="entrez le libelle"></th>
  </tr>
  <tr>
    <th>Prix :</th>
    <th><input class="form-control" type="number" name="i_prix" placeholder="entrez le prix"></th>
  </tr>
  <tr>
    <th>Description :</th>
    <th><input class="form-control" type="text" name="i_desc" placeholder="entrez la description"></th>
  </tr>
   <tr>
    <th>Adresse image :</th>
    <th><input class="form-control"  type="text" name="i_adressimg" placeholder="entrez l'Adresse de l'image"></th>
  </tr>
</table>

<br><br>
		<input type="submit" class ="btn btn-info mr-2" name="ajouterFct" value="ajouter">
		<a href="index.php "class ="btn btn-info " >annuler</a>
		</form>
	
		
	<br>

	<?php 
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['ajouterFct'])){
			ajouterFct();
		}
		function ajouterFct(){
			
			$conn = mysqli_connect("localhost","root","","devoir0");

			$n_libelle = mysqli_real_escape_string($conn, $_REQUEST['i_libelle']);
			$n_prix = mysqli_real_escape_string($conn, $_REQUEST['i_prix']);
			$n_desc = mysqli_real_escape_string($conn, $_REQUEST['i_desc']);
			$n_adressimg = mysqli_real_escape_string($conn, $_REQUEST['i_adressimg']);
     
     $sqlR = "INSERT INTO parfum (libelle, prix ,description, img_adress) VALUES ('$n_libelle', $n_prix ,'$n_desc','$n_adressimg') ";

if(mysqli_query($conn, $sqlR)){?>

   <p> <?php echo "Le nouveau parfum a été bien ajouté";?></p>
    <?php
} 

else{?>
   <p> <?php echo "Un probleme est survenu, veuillez remplir les champs correctement  ";?></p>
<?php  }
			mysqli_close($conn);
	
		 }
		 ?>

</center>
</body>
</html>