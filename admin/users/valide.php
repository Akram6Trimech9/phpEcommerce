<?php 
$id= $_GET['iduser'];
 include "../../component/functions.php";
$conn = connect();
$active=1;
$requette = "UPDATE clients SET etat='$active' WHERE id='$id'";
$resultat = $conn->query($requette);
 if($resultat){ 
     header('location:adminpage.php');
 }
?>  
