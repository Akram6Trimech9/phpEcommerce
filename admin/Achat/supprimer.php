<?php 
$id= $_GET['idcat'];
include "../../component/functions.php";
$conn = connect();
$requette = "DELETE FROM commande WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
  header("location:livraison.php?delete=ok"); 
 }
?>