<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<title>modification</title>
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
$result = mysqli_query($connect, "SELECT libelle, prix , description, img_adress  from parfum where idparfum =  $id ");

$row = mysqli_fetch_array($result);

 ?>

<center>
<h3>modifiez les informatios du parfum :</h3>

<form action="update.php?id=<?php echo $id ?>" method="post" >

<table   cellpadding="10" >
	<tr>
    <th>Libellé :</th>
    <th><input class="form-control" type="text" name="i_libelle" placeholder="entrez le libelle" value="<?php echo $row['libelle'] ?>"></th>
  </tr>
  <tr>
    <th>Prix :</th>
    <th><input class="form-control" type="number" name="i_prix" placeholder="entrez le prix" value="<?php echo $row['prix'] ?>"></th>
  </tr>
  <tr>
    <th>Description :</th>
    <th><input class="form-control" type="text" name="i_desc" placeholder="entrez la description" value="<?php echo $row['description'] ?>"></th>
  </tr>
   <tr>
    <th>Adresse image :</th>
    <th><input class="form-control"  type="text" name="i_adressimg" placeholder="entrez l'Adresse de l'image" value="<?php echo $row['img_adress'] ?>"></th>
  </tr>
</table>
<br>
		<input type="submit" class ="button" name="update" value="modifier">
		</form>
		<a href="index.php"><button>Annuler</button></a>
	<br>

<?php
                $msg = "";
                if(isset($_GET['error'])){
                    $msg = "un probleme est survenu, veuillez remplir les champs correctement ";
                    echo '<div>'.$msg.'</div>';
                }else if(isset($_GET['done'])){
                    $msg = "les information du parfum ont été bien modifié";
                    echo '<div>'.$msg.'</div>';
                }
            ?>


</center>
</body>
</html>



<?php 
		/* if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['update'])){
			update();
		}
		function update(){
			$nid = $_GET["nid"];
			$conn = mysqli_connect("localhost","root","","devoir0");

			$n_libelle = mysqli_real_escape_string($conn, $_REQUEST['i_libelle']);
			$n_prix = mysqli_real_escape_string($conn, $_REQUEST['i_prix']);
			$n_desc = mysqli_real_escape_string($conn, $_REQUEST['i_desc']);
			$n_adressimg = mysqli_real_escape_string($conn, $_REQUEST['i_adressimg']);
     
    $sqlR = " UPDATE parfum SET (libelle , prix , description , img_adress)=('$n_libelle', '$n_prix' ,'$n_desc','$n_adressimg') WHERE idparfum = $nid)";



?>

   <p> <?php echo $nid ;?></p>
    <?php



//     "INSERT INTO parfum (libelle, prix ,description, img_adress) VALUES ('$n_libelle', $n_prix ,'$n_desc','$n_adressimg') ";
$done = mysqli_query($conn, $sqlR);
if($done){?>

   <p> <?php echo "Le nouveau parfum a été bien modifié";?></p>
    <?php
} 

else{?>
   <p> <?php echo "Un probleme est survenu, veuillez remplir les champs correctement  ";?></p>
<?php  }
			mysqli_close($conn);
	
		 }
		    */ ?>


