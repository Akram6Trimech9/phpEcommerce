<?php 
$id= $_GET['idcat'];
include "../../component/functions.php";
$conn = connect();
$requette = "DELETE FROM produit WHERE idproduit='$id'";
$resultat = $conn->query($requette);
if($resultat){
  header("location:listproduit.php?delete=ok"); 
 }
?>