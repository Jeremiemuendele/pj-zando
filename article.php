<?php
include "connection.php";
$ctr=0;
if(isset($_POST['valider'])){
    $libelle=$_POST['libelle'];
    $contenu= htmlspecialchars($_POST['contenu'], ENT_QUOTES, 'UTF-8');
    $prix=$_POST['prix'];
    $couleur=$_POST['couleur'];
    $datpub=$_POST['datpub'];
    $categorie=$_POST['categorie'];
    $qt=$_POST['qt'];
    $avis=$_POST['avis'];
    $photo=$_FILES['photo']['name'];

   
    if (copy($_FILES['photo']['tmp_name'],'imgarticle/'.$photo)) {
        $insert_art=$connection->query("INSERT INTO article(libelle,contenu,prix,couleur,photo,idcat,qt,avis,datpub) VALUES ('".$libelle."','".$contenu."','".$prix."','".$couleur."','".$photo."','".$categorie."','".$qt."','".$avis."','".$datpub."')");
         header('location:ac.php');
         exit();
        # code..,
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>publier un evenement</title>
    
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="asset/css/fontawesome.css">
    <link rel="stylesheet" href="asset/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="asset/css/owl.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="dist/js/bootstrap.min.js"></script>
    <style>
        .form-control {
    width: 100%;
    height: 40px;
    font-size: 1em;
    color: #fff;
    padding: 0 10px 0 35px;
    background: transparent;
    border: 1px solid #fff;
    outline: none;
    border-radius: 5px;
}

    body {
    
        background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),  url('jere.jpg') no-repeat;
        background-size: cover;
    background-blend-mode: darken;
    background-position: center;
    
}
  </style>
 
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-4"> <a href="menu_admin.php"  style="border-radius: 30px 0 0 30px; " ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg> precedent</a>
</div>
            <div class="col-md-5">

            <form  action="" method="post" enctype="multipart/form-data">
        

        <h3 class="form-login-heading text-center"></h3>
        
        <div class="login-wrap">
		  <div id="info" style="font-weight:bold;"></div>
          
                  <input type="text" class="form-control" name="libelle" placeholder="libelle" autofocus>
            <br>
            <input type="number" class="form-control" name="qt" placeholder="quantité" >
           
               <br>
               <textarea name="avis" id="" cols="30" rows="10"placeholder="avis sur la commande" class="form-control"></textarea>
         
               <br>
          <textarea name="contenu" id="" cols="30" rows="10"placeholder="Les détails de l'article" class="form-control"></textarea>
           <br>
          <input type="text" class="form-control" name="prix" placeholder="prix" >
          <br>
          <input type="text" class="form-control" name="couleur" placeholder="couleur">
         
          <input type="hidden" value="<?php echo date('Y-m-d H:i') ;  ?>" name="datpub" class="form-control">
                 <br>
    
          <div class="col-md-12">
                <input type="file" class="form-control" name="photo">
            </div>
        <br>
            <select name="categorie" id="" class="form-control">
                    <option value="-1">--Choisir une categorie--</option>
                    <?php
                        $req_cat=$connection->query("SELECT * FROM categorie");
                        while ($dn_cat=$req_cat->fetch()) {                   
                        
                    ?>
                    <option value="<?php echo $dn_cat['idcat'] ?>"><?php echo $dn_cat['categorie'] ?></option>
                    <?php } ?>
               </select>
<br>

          <button class="btn btn-theme btn-success" id="valid" name="valider"><i class="fa fa-download"></i> Enregistrer</button>
        
          
       
        </div>
        <br>
        </form>
        </div>
            </div>
            <div class="row">
           
            <div class="col-md-12">
            <table class="table table-striped" style="color : white;">
            <thead>
                <tr>
                    <th width='5%'>#</th>
                    <th width='15%'>libelle</th>
                    <th width='15%'>Contenue</th>
                    <th width='15%'>prix</th>
                    <th width='15%'>couleur</th>
                    <th width='15%'>photo</th>
                    <th width='15%'>categorie</th>
                    <th width='15%'>qt</th>
                    <th width='15%'>avis</th>
                    <th width='15%'>datpub</th>
                    <th width='15%'>Supprimer</th>
                    <th width='15%'>Modifier</th>
                   
                       </tr>
            </thead>
            <tbody>
        <?php
                  
                    $req_admi=$connection->query("SELECT * FROM article");
                    while ($row=$req_admi->fetch()) {
                        # code...
                        $ctr++;
                    
                ?>
                <tr>
                    <td><?php echo $ctr; ?></td>
                    <td><?php echo $row['libelle']; ?></td>
                    <td><?php echo $row['contenu']; ?></td>
                    <td><?php echo $row['prix']; ?></td>
                    <td><?php echo $row['couleur']; ?></td>
                    <td><img src="imgarticle/<?php echo $row['photo']; ?>"style="width:40px;height:40px;" alt=""></td>
                    <td><?php
                   $id=$row['idcat'];
                   $aff_cat=$connection->query("SELECT * FROM categorie WHERE idcat=$id");
                   $don=$aff_cat->fetch();
                   echo $don['categorie'];
                    ?></td>
                    <td><?php echo $row['qt']; ?></td>
                    <td><?php echo $row['avis']; ?></td>
                    <td><?php echo $row['datpub']; ?></td>
                 
                           
                 
                 
                    <td><a href="modif_evenement.php?idev=<?php echo $row['idev'] ?>" class="btn btn-warning btn-sm">Modifier</a></td>
                    <td><a href="supprim_evenement.php?idev=<?php echo $row['idev'] ?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                <br>
                </tr>
                <?php
                }
                ?>
                </tbody>
                </table>
            </div>
           
        </div>
    </div>



<div id="login-pag">
    <div class="container">

    <div class="col-md-4"></div>
        <div class="col-md-5">


       
        
       
        </div>
        </div>
        </div>
  
</body>
</html>