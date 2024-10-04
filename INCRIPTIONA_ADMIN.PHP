<?php
session_start();
include "connection.php";
   
if(isset($_POST['valider'])){
   
    if(!empty($_POST['nom']) AND !empty($_POST['prenom'] ) AND !empty($_POST['password'] ) AND !empty($_POST['tel'] ) AND !empty($_POST['adresse'] )  AND !empty($_POST['reference'] )){
      
        
        $nom=$_POST['nom'];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
      
        $reference=$_POST['reference'];
        $photo=$_FILES['photo']['name'];
        $prenom=$_POST['prenom'];
        $tel=$_POST['tel'];
        $adresse=$_POST['adresse'];
       
        $datecompt=$_POST['datecompt'];
    
        if (copy($_FILES['photo']['tmp_name'],'profiladmin/'.$photo)) {
            $insert_admin=$connection->query("INSERT INTO admin(nom,prenom,password,reference,tel,adresse,datecompt,photo) VALUES ('".$nom."','".$prenom."','".$password."','".$reference."','".$tel."','".$adresse."','".$datecompt."','".$photo."')");
        
            header('location:article.php');
            exit();
            # code..,
        }
    }else {
       echo "verifier que les champs sont bien rempli";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        form{
            size: 106px; 
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
    
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
    <script src="dist/js/bootstrap.min.js"></script>
</head>
<body>
<div id="login-page">
    <div class="container">
        <form class="form-login" action="" method="post" enctype="multipart/form-data">
        

        <h3 class="form-login-heading text-center">Inscription chez <br> pj ZANDO</h3>
        
        <h1 class="text-center"><img src="imgapplication/LOGO CORPORATION.PNG" height="100" width="300"></h1>
        <h5 class="form-login-heading text-center"></h5>
        
        <div class="login-wrap">
		  <div id="info" style="font-weight:bold;"></div>
         
          <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre Nom">
          <br>
          <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prenom">
          <br>
          
          <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe"><br/>
          <input type="tel" class="form-control" name="tel" id="tel" placeholder="Votre numero de téléphone">
          <br>
          <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Votre adresse">
          <br>
          
          
          <textarea name="reference" cols="33" rows="5" id="" placeholder="veillez ecrire une reference qui vous servira lors de perte de mot de passe"></textarea>
          <br>
          <div class="col-md-12">
            <br>
                <input type="file" class="form-control" name="photo">
            </div>
            <br>
            <input type="hidden" value="<?php echo date('Y-m-d H:i') ;  ?>" name="datecompt" class="form-control">
        
            <br>
            <br>
          <button class="btn btn-theme btn-success" id="valid" name="valider"><i class="fa fa-lock"></i>S'inscrire</button>
          <hr>
          
          
        <a href="login.php">se connecter</a>
          
        </div>
        </form>
        
        </div>
        </div>
  
</body>
</html>