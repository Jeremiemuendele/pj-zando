<?php
include "connection.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

  <head>
   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Cyborg - Awesome HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="asset/css/fontawesome.css">
    <link rel="stylesheet" href="asset/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="asset/css/owl.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="profilutil/<?php echo$_SESSION['photo'];?>" style="width:60px;height:60px;border-radius:100px">
                        <h3 style="color:blue"><?php echo$_SESSION['pseudo'];?></h3>
                        </a><br>
                     <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.html" class="active">Home</a></li>
                        <li><a href="browse.html">Browse</a></li>
                        <li><a href="details.html">Details</a></li>
                        <li><a href="streams.html">Streams</a></li>
                        <li><a href="profile.html">Profile <img src="asset/images/profile-header.jpg" alt=""></a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
        <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        

          <!-- ***** Featured Games Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4><em>VETEMENT à la une  </em> TENDANCE</h4>
                </div>
                <div class="owl-features owl-carousel">
                <?php
                     $req_conn=$connection->query("SELECT a.idart,a.libelle,a.contenu,a.prix,a.couleur,a.photo,a.idcat,a.qt,a.avis,a.datpub 
                     FROM article a
                     ORDER BY a.idart DESC
                     ");
                     $limite=20;
                     $i=0;
                     while ($i<$limite AND $aff=$req_conn->fetch()) {
                        
                     
                    ?>
                  <div class="item">
                    <div class="thumb">
                      <img src="imgarticle/<?php echo $aff['photo'] ?>" alt="">
                      <div class="hover-effect">
                        <h6><?php echo $aff['prix'] ?></h6>
                      </div>
                    </div>
                    <h4><?php echo $aff['libelle'] ?><br></h4>
                    <ul>
                      <li><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                      <li></i> Best Quality</li>
                    </ul>
                  </div>
                  <?php
                  $i++;
              }
              ?>
                  
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/images/featured-03.jpg" alt="">
                      <div class="hover-effect">
                        <h6>2.4K Streaming</h6>
                      </div>
                    </div>
                    <h4>Island Rusty<br><span>249K Downloads</span></h4>
                    <ul>
                      <li><i class="fa fa-star"></i> 4.8</li>
                      <li><i class="fa fa-download"></i> 2.3M</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <!-- ***** Featured Games End ***** -->
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
           
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Most Popular</em> Right Now</h4>
                </div>
                <div class="row"> 
                  <?php
                     $req_conn=$connection->query("SELECT a.idart,a.libelle,a.contenu,a.prix,a.couleur,a.photo,a.idcat,a.qt,a.avis,a.datpub 
                     FROM article a
                     ORDER BY a.idart DESC
                     ");
                     while ($row=$req_conn->fetch()) {
                        
                     
                    ?>
                  
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" >
                    
                    <div class="item">
                      <img src="imgarticle/<?php echo $row['photo'] ?>" alt="">
                      <ul>
                <li><i class="fa fa-star"></i> 3.8</li>
                
            </ul>
                      <h4><?php echo $row['libelle'] ?><br> </h4>
                      <div class="text-center">
                     
                      <p><?php echo $row['prix'] ?></p>
                      </div>
                      
                       <div ><p><?php echo $row['contenu'] ?><br>
                      </p></div>
                    </div>
                  </div>
                  <?php
              }
              ?>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->
         
          <!-- ***** Gaming Library Start ***** -->
          
          <!-- ***** Gaming Library End ***** -->
        
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 <a href="#">PJ corporation</a> . 
          
          <br>Design by : <a href="#">PJ corporation</a> .
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="asset/js/isotope.min.js"></script>
  <script src="asset/js/owl-carousel.js"></script>
  <script src="asset/js/tabs.js"></script>
  <script src="asset/js/popup.js"></script>
  <script src="asset/js/custom.js"></script>


  </body>

</html>
