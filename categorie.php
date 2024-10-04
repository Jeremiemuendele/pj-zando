<?php
include "connection.php";
$ctr=0;
if(isset($_POST['valider'])){
    $categorie=$_POST['categorie'];
   

  
        $insertcat=$connection->query("INSERT INTO categorie(categorie) VALUES ('".$categorie."')");
         header('location:categorie.php');
         exit();
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
    
  <!-- Bootstrap core CSS -->
   <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="dist/js/bootstrap.min.js"></script>
    <style>
    body {
    
        background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),  url('jere.jpg') no-repeat;
        background-size: cover;
    background-blend-mode: darken;
    background-position: center;
    
}
  </style>
 
</head>
<body>
<div id="login-pag">
    <div class="container">
<div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-5">
        <a href="menu_admin.php"  style="border-radius: 30px 0 0 30px; " ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg> precedent</a>

        <form  action="" method="post" enctype="multipart/form-data">
        

        <h3 class="form-login-heading text-center"></h3>
        
        <div class="login-wrap">
		 
                <input type="text" class="form-control" name="categorie" placeholder="categorie" autofocus>
       <br>
          <button class="btn btn-theme btn-success" id="valid" name="valider"><i class="fa fa-download"></i> Ajouter</button>
        
          
       
        </div>
        </form>
        </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <table class="table table-striped" style="color : white;">
            <thead>
                <tr>
                    <th width='5%'>#</th>
                    <th width='65%'>Categorie</th>
                    <th width='15%'>Modification</th>
                    <th width='15%'>Supression</th>
                </tr>
            </thead>
            <tbody>
        <?php
                  
                    $cat=$connection->query("SELECT * FROM categorie");
                    while ($row=$cat->fetch()) {
                        # code...
                        $ctr++;
                    
                ?>
                <tr>
                    <td><?php echo $ctr; ?></td>
                    <td><?php echo $row['categorie']; ?></td>
                    <td><a href="modif_categorie.php?idcat=<?php echo $row['idcat'] ?>" class="btn btn-warning btn-sm">Modifier</a></td>
                    <td><a href="supprim_categorie.php?idcat=<?php echo $row['idcat'] ?>" class="btn btn-danger btn-sm">Supprimer</a></td>
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
        </div>
  
</body>
</html>