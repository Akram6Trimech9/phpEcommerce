<?php 
session_start();
   $nom = $_POST['nomproduit'];
  $quantiteproduit=$_POST['quantiteproduit'];
  $imageproduit=$_POST['imageproduit'];
  $prix=$_POST['prix'];
  $description=$_POST['description'];
  $category=$_POST['category'];
   include "../../component/functions.php";
   $conn = connect();

    $requete = "INSERT INTO produit(nomproduit,quantiteproduit,imageproduit,prix,description,category) VALUES ('$nom','$quantiteproduit','$imageproduit','$prix','$description','$category')";
  $resultat = $conn->query($requete);
   if($resultat){
         header('location:listproduit.php?ajout=ok');
   } 
 ?> 