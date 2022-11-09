<?php 
   include "../../component/functions.php";
   $commandes=getAllachats();
  ?>

<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href='../css/styles.css' />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <a href="../users/adminpage.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; Users </a>
    <a href="../category/categories.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Categories</a>
    <a href="../produit/listproduit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; Products</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw"></i>&nbsp; Contacts</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-shopping-cart fa-fw"></i>&nbsp; Achats</a><br><br>
  </div>
</nav>
 
 <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 <div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>
  <div class="w3-container">
     <div  class="addnew">
        <h5 style="padding:20px" > Les commandes  </h5>
 </div>
     <?php  
      if(isset($_GET['delete']) && $_GET['delete']== "ok"){
        print '        <div class="alert alert-success"> Category supprimer   </div> ' ;
  
         }   ?>      <br />
  <br />
  <table style="width:100% ;margin-top:60px" class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Idcommande</th>
      <th scope="col">email</th>
      <th scope="col">ville</th>
      <th scope="col">region</th>
      <th scope="col">adresse</th>
       <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php 
      foreach ($commandes as $commande){ 
          print ' <tr> 
          <th scope="row">'.$commande['id'].'</th>
            <td>'.$commande['email'].'</td>
            <td>'.$commande['ville'].'</td>
            <td>'.$commande['region'].'</td>
            <td>'.$commande['adresse'].'</td>
            <td>
              <a href="supprimer.php?idcat='.$commande['id'].' "  class="btn btn-danger">Supprimer</a>
              <button class="btn btn-warning modal-title" data-toggle="modal" data-target="#editmodal'.$commande['id'].'"  > Detaille de produit </button>
      
            </td>
          </tr>';
      }  
   ?>
   
  </tbody>
</table>
  </div>
<style>
    .addnew{
         display :flex ; 
          flex-direction:row ; 
          
    }
    </style>
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    
  </footer>

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
<?php foreach($commandes as $index => $commande ){?>
  <div class="modal fade" id="editmodal<?php echo $commande['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <?php
       $produit=getproduitbyid($commande['idproduit'])
      // $requette="SELECT * FROM produit WHERE category='$commande['id']'";
     ?>
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Detaille produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card" style="width:100%;">
  <div   class="card-body">
    <h5 class="card-title"><?php  echo $produit['nomproduit'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><img  width="60px" src="<?php echo $produit['imageproduit'] ?>"></h6>
    <p class="card-text"><?php echo $produit['description'] ?></p>
    
  </div>
</div>
     </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
 
</div>
  <?php }?>
</html>
 