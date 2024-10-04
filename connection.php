<?php
try {
    $connection = new PDO("mysql:host=localhost;dbname=bdd_pjcorporation;charset=utf8","root","");
    $connection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //throw $th;
    echo "Erreur de la connexion ";
}
?>