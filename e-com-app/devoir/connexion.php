<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <meta charset="utf-8">
   
	<title>Connexion</title>
</head>
<body bgcolor="bluefff">
<?php session_start(); 
if($_SESSION)
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

<div class="row ">
  <div class="col-4 mt-5 mx-auto pb-3 card border border-primary disabled">

<form action="connexion.php" method="post" >
<h2 class="text-center mt-4 mb-3">Connexion</h2>
<label>Username : </label>
<input class="form-control mb-2" type="text" name="i_login" placeholder = "entrez votre Login" >

<label>Password : </label>
<input type="password" class="form-control"  name="i_password" placeholder = "entrez votre password" >
<br><br>
<div class="text-center" ><input class ="btn btn-info mr-2 " type="submit" name="connexion" value="connexion">
<a class ="btn btn-info " href="index.php">Annuler</a></div>
</form>


<br><br>

            <?php 
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['connexion'])){
			connexion();
		}
		function connexion(){
		$i_login = $_POST["i_login"];
     $i_password = $_POST["i_password"];
     $conn = mysqli_connect("localhost","root","","devoir0");
     $sqlR = "select * from user where login = '$i_login' and password = '$i_password'";
     $resultLogin = mysqli_query($conn, $sqlR);
     $row = mysqli_fetch_assoc($resultLogin);
     if(empty($i_login) || empty($i_password))
        {  ?>

   <p class="text-center mt-3"> <?php echo "Veuillez remplir les champs svp !";?></p>
    <?php }
    
     else if(!$row)
        {?>

   <p class="text-center mt-3"> <?php echo "Le username ou le password est inccorect! Veuillez réessayer ";?></p>
    <?php }
     else{
        session_start();
        $_SESSION["login"] = $row["login"];
        $_SESSION["role"] = $row["role"];
        mysqli_close($conn);
        header('location:index.php');
    } 
}
		 ?>
	



                </div>
            </div>
           
</body>
</html>