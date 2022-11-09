<?php 
$id= $_GET['idcat'];
include "../../component/functions.php";
$conn = connect();
$requette = "DELETE FROM Category WHERE ID='$id'";
$resultat = $conn->query($requette);
if($resultat){
  header("location:categories.php?delete=ok"); 
 }
?>