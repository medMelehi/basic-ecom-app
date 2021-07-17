<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<title>users</title>
	
  
  
</head>

<body>

<?php session_start(); 
$admin = "admin";
if($_SESSION["role"] != $admin )
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
	<div id="formAdd" >
	<h3>Addition d'un nouveau utilisateur</h3>
<form action="addUser.php" method="post">
<table   cellpadding="10" >
	<tr>
    <th>Login :</th>
    <th><input class="form-control" type="text" name="i_login" placeholder="entrez le login"></th>
  </tr>
  <tr>
    <th>Password :</th>
    <th><input class="form-control" type="text" name="i_password" placeholder="entrez le password"></th>
  </tr>
  <tr>
    <th>Role :</th>
    <th><input class="form-control" type="text" name="i_role" placeholder="entrez le role"></th>
  </tr>
</table>
<br>
<input class ="btn btn-info " type="submit" value="Ajouter">

</form>
</div>
<br>


<?php
           $msg = "";
           if(isset($_GET['error']))
               $msg = "ce login est déja pris!  ";
           else if(isset($_GET['done']))
               $msg = "l'utilisateur a été bien Ajouté ";
          else if(isset($_GET['error2']))
               $msg = "veuillez remplir les champs correctement !";

           echo '<div>'.$msg.'</div>';
                
            ?>
</center>
<div class="container" >
	<h2 class="ml-5" >Users :</h2>
<table id="tb" align="center" border="1" cellpadding="15"  >
	<thead>
  <tr>
    <th>id user</th>
    <th>login</th>
    <th>Password</th>
    <th>role</th>
    <th>modifier</th>
    <th>supprimer</th>
  </tr>
 </thead>
<tbody>


<?php

$connect = mysqli_connect('localhost','root','','devoir0') or die("Erreur
deconnexion auserveur.");
$result = mysqli_query($connect, "SELECT iduser, login, password , role   from user");
while ( $row = mysqli_fetch_array($result)){
	?>

 <tr>
    <td><?php echo $row['iduser'] ?></td>
    <td><?php echo $row['login'] ?></td>
    <td><?php echo $row['password'] ?></td>
    <td><?php echo $row['role'] ?></td>
    <td><a href="updateUser.php?id=<?php echo
    $row['iduser']  ?>">modifier</a></td>
    <td><a href="deleteUser.php?id=<?php echo
    $row['iduser']  ?>">supprimer</a></td>

  </tr>



<?php
}
mysqli_close($connect);
?>
</tbody>
</table>
</div>
<br>


</body>
</html>