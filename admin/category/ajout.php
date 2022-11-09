<?php 
session_start();
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $createur = $_SESSION['id'];
  $date_creation = date("Y-m-d");
  include "../../component/functions.php";
   $conn = connect();

    $requete = "INSERT INTO Category(nom,description,Createur,DateCreation,Datemodification) VALUES ('$nom','$description','$createur','$date_creation','$date_creation')";
  $resultat = $conn->query($requete);
   if($resultat){
         header('location:categories.php?ajout=ok');
   } 
 ?> 