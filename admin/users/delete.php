<?php 
$id= $_GET['iduser'];
include "../../component/functions.php";
$conn = connect();
$requette = "DELETE FROM clients  WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
  header("location:adminpage.php?delete=ok"); 
 }
?>