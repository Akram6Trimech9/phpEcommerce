<?php 
session_start();
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $Datemodification = date("Y-m-d");
  $id=$_POST['id'];
  include "../../component/functions.php";
   $conn = connect();
    $requette = "UPDATE   Category SET nom='$nom',description='$description' , Datemodification='$Datemodification' WHERE ID='$id' ";
    $resultat=$resultat = $conn->query($requette);
    if($resultat){
         header('location:categories.php?modifier=ok');
   } 
 ?> 