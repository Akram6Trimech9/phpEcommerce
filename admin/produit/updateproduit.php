<?php 
session_start();
  $nom = $_POST['nomproduit'];
  $quantiteproduit=$_POST['quantiteproduit'];
  $imageproduit=$_POST['imageproduit'];
  $prix=$_POST['prix'];
  $description=$_POST['description'];
  $category=$_POST['category'];
  $id=$_POST['id'];
  include "../../component/functions.php";
   $conn = connect();
    $requette = "UPDATE   produit SET nomproduit='$nom',quantiteproduit='$quantiteproduit' , imageproduit='$imageproduit',  prix='$prix',description='description'  , category='$category' WHERE idproduit='$id' ";
    $resultat=$resultat = $conn->query($requette);
    if($resultat){
         header('location:listproduit.php?modifier=ok');
   } 
 ?> 