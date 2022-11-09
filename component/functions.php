<?php 
  function connect(){
    $servername = "127.0.0.1";
    $username = "admin";
    $password = "admin";
    try {
      $conn = new PDO("mysql:host=$servername;port=3306; dbname=E-commerce", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $conn ;
  }

 function getAllcategories(){
  $conn=connect()  ;
    $requette= "SELECT * FROM  Category";
    $resultat= $conn->query($requette);
    $categories= $resultat->fetchAll();

    return $categories;
 }
 function getAllproducts(){
  $conn=connect()  ;
    $requette= "SELECT * FROM  produit";
    $resultat= $conn->query($requette);
    $products= $resultat->fetchAll();
    return $products;
 }
 function searchproduct($keyword){
  $conn=connect()  ;
    $requette= "SELECT * FROM  produit WHERE nomproduit LIKE '%$keyword%'";
    $resultat= $conn->query($requette);
    $products= $resultat->fetchAll();
    return $products;
 }

 function getproduitbyid($id){
  $conn=connect()  ;
   $requette = "SELECT * FROM produit WHERE idproduit=$id";
   $resultat= $conn->query($requette);
   $product= $resultat->fetch();
   return $product;
 }
  function addvisiteur($data){
  //   $nom=$data['nom'];
  // $prenom=$data['prenom']; 
  // $email=$data['email'];
  // $mdp=$data['mdp'];
  $conn=connect()  ;
  // $email=$data['email'];
  //   $mdp=md5($data['mdp']);
  //   $requette="SELECT * FROM clients WHERE email='$email' AND mdp='$mdp'" ;
  //   $resultat= $conn->query($requette);
  //   $user = $resultat->fetch();
  //    if(count($user)>=1){
  //     var_dump('user exist');
  //    }else{ 
      $requette="INSERT INTO clients(nom,email,mdp,prenom) VALUES('".$data['nom']."','".$data['email']."','".md5($data['mdp'])."','".$data['prenom']."')" ;
      $resultat= $conn->query($requette);
      if ($resultat){
       return true ; 
      } else {
       return false ;
      } 
    }
  function Connectusers($data){
    $conn=connect()  ;
    $email=$data['email'];
    $mdp=md5($data['mdp']);
     $requette="SELECT * FROM clients WHERE email='$email' AND mdp='$mdp'" ;
     $resultat= $conn->query($requette);
     $user = $resultat->fetch();
      var_dump($user);
     return $user ;
  }
  function connectadmin($data){
    $conn=connect()  ;
    $email=$data['email'];
    $mdp=md5($data['mdp']);
     $requette="SELECT * FROM administrator WHERE email='$email' AND mdp='$mdp'" ;
     $resultat= $conn->query($requette);
     $user = $resultat->fetch();
      var_dump($user);
     return $user ;
  } 
  function getusers(){
    $conn=connect()  ;
     $requette= "SELECT * FROM clients";
     $resultat= $conn->query($requette);
     $user = $resultat->fetchAll();
     return $user ;
  }
  function addcommande($data){
    $conn=connect()  ;
        $requette="INSERT INTO commande(email,region,ville,idproduit,telephone,adress,idclient) VALUES('".$data['email']."','".$data['region']."','".($data['ville'])."','".$data['idproduit']."','".$data['telephone']."','".$data['adress']."','".$data['idclient']."')" ;
        $resultat= $conn->query($requette);
        if ($resultat){
         return true ; 
        } else {
         return false ;
        } 
      }
  function filtrebyctagory($cat){
    $conn=connect()  ;
    $requette= "SELECT * FROM  produit WHERE category=$cat ";
    $resultat= $conn->query($requette);
    $products= $resultat->fetchAll();
    return $products;
  }    
  function getAllachats(){
    $conn=connect()  ;
      $requette= "SELECT * FROM  commande";
      $resultat= $conn->query($requette);
      $commande= $resultat->fetchAll();
      return $commande;
   }
   function getproduitbycategory($cat){
    $conn=connect()  ;
    $requette = "SELECT * FROM produit WHERE category=$cat";
    $resultat= $conn->query($requette);
    $product= $resultat->fetch();
    return $product;
   }
?>