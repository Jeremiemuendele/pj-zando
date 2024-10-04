<?php
include "connection.php";
session_start();
$err=0;
// Traitement du formulaire de connexion
if (isset($_POST["valider"])) {
  if(!empty($_POST['tel']) AND !empty($_POST['password'])){
    $err=0;
  
    $nomadmin = htmlspecialchars($_POST['tel']);
    $password = htmlspecialchars($_POST["password"]);

    $req = $connection->prepare("SELECT * FROM utilisateur WHERE tel=?");
    $req->execute(array(
      htmlspecialchars($_POST['tel'])
    ));

    if($req->rowCount() > 0) {
        $results = $req->fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST["password"] , $results['password'])){
        

          
          $_SESSION['idutil'] = $results['idutil'];
          $_SESSION['pseudo'] = $results['pseudo'];
          $_SESSION['nom'] = $results['nom'];
         $_SESSION['prenom'] = $results['prenom'];
        
          $_SESSION['photo'] = $results['photo'];
          
          header("Location:inde.php");
          exit();

        }else{
          echo "Password is wrong";
          $err=1;
        }
    } else {
       
        $err=1;
    }
  }else{
    echo "Les champs sont vides";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection</title>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
   
    <link rel="stylesheet" href="style.css">
<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),  url('imgapplication/LOGO CORPORATION.png') no-repeat;
    background-size: cover;
background-blend-mode: darken;
background-position: center;
}

</style>
 
</head>

<body>
<div class="wrapper">
        <form action="" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" placeholder="votre num de tel" name="tel" >
            </div>
            <div class="input-group">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" name="password" placeholder="Password" >
            </div>
            <div class="forgot-pass">
                <a href="recuperation_compte.php">Mot de passe oublier?</a>
            </div>
            <button type="submit" class="btn" name="valider">Login</button>
            <hr>
          <?php if($err==1) { ?>
          <p style="color:red;">Nom utilisateur et/ou mot de passe incorrect</p>
          <?php } ?>
       
          <br>
        
          <a href="inscription.php">s'inscrire</a>
        </form>
    </div>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- js placed at the end of the document so the pages load faster -->
</body>

</html>
