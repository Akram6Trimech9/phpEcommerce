<?php
include "../../component/functions.php" ;
 $clients=getusers(); 
   ?>
<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
  <a href="../deconnect.php" style="  text-decoration: none;"  class="w3-bar-item w3-right ">Deconnexion</a>
 </div>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <!-- <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px"> -->
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php  $_SESSION['nom'] ?></strong></span><br>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; Users </a>
    <a href="../category/categories.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Categories</a>
    <a href="../produit/listproduit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; Products</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw"></i>&nbsp; Contacts</a>
    <a href="../Achat/livraison.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-shopping-cart fa-fw"></i>&nbsp; Achats</a><br><br>

  </div>
</nav>
 
 <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 <div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <table style="width:100% ;margin-top:60px" class="table table-sm">
  <thead>
    <tr> <th scope="col">Nom </th>
         <th scope="col">etat </th>
         <th scope="col">action</th> </tr>
  </thead>
  <tbody>
 
    <?php foreach($clients as $client){
       $act;
       if($client['etat']==0){
         $act='not active';
       }elseif($client['etat']==1){
          $act='active';
       }
          print ' <tr> 
          <th scope="row">'.$client['nom'].'</th>
            <td>'.$act.'</td>
            <td>
             <a href="delete.php?iduser='.$client['id'].' "  class="btn btn-danger">Supprimer</a>
             <a href="valide.php?iduser='.$client['id'].' "  class="btn btn-success">Activer</a>

          </td>
          </tr>';
      }  
   ?>
   
  </tbody>
</table>      
   
    
       
    </ul>
  </div>

  <!-- Footer -->
 

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>