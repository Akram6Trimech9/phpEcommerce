<?php
include "component/functions.php" ;
$categories=getAllCategories();
$user=true;
session_start();
if(isset($_SESSION['nom'])){
    header('location:profile.php');
}
  if(!empty($_POST)){
    $user=Connectusers($_POST);
       if(count($user) > 0){
         session_start();
         $_SESSION["id"]=$user['id'];
         $_SESSION["email"]=$user['email'];
         $_SESSION["nom"]=$user['nom'];
         $_SESSION["prenom"]=$user['prenom'];
         header('location:index.php'); // redirection   
      }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" >
    <title>E-commerce</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.css" /> 

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
    <style>
    body {
        font-family: 'Varela Round', sans-serif;
    }
    .form-control {
        box-shadow: none;		
        font-weight: normal;
        font-size: 13px;
    }
    .navbar {
        background: #fff;
        padding-left: 16px;
        padding-right: 16px;
        border-bottom: 1px solid #dfe3e8;
        border-radius: 0;
    }
    .nav-link img {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        margin: -8px 0;
        float: left;
        margin-right: 10px;
    }
    .navbar .navbar-brand {
        padding-left: 0;
        font-size: 20px;
        padding-right: 50px;
    }
    .navbar .navbar-brand b {
        color: #33cabb;		
    }
    .navbar .form-inline {
        display: inline-block;
    }
    .navbar a {
        color: #888;
        font-size: 15px;
    }
    .search-box {
        position: relative;
    }	
    .search-box input {
        padding-right: 35px;
        border-color: #dfe3e8;
        border-radius: 4px !important;
        box-shadow: none
    }
    .search-box .input-group-text {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
        height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
    }
    .navbar .sign-up-btn {
        min-width: 110px;
        max-height: 36px;
    }
    .navbar .dropdown-menu {
        color: #999;
        font-weight: normal;
        border-radius: 1px;
        border-color: #e5e5e5;
        box-shadow: 0 2px 8px rgba(0,0,0,.05);
    }
    .navbar a, .navbar a:active {
        color: #888;
        padding: 8px 20px;
        background: transparent;
        line-height: normal;
    }
    .navbar .navbar-form {
        border: none;
    }
    .navbar .action-form {
        width: 280px;
        padding: 20px;
        left: auto;
        right: 0;
        font-size: 14px;
    }
    .navbar .action-form a {		
        color: #33cabb;
        padding: 0 !important;
        font-size: 14px;
    }
    .navbar .action-form .hint-text {
        text-align: center;
        margin-bottom: 15px;
        font-size: 13px;
    }
    .navbar .btn-primary, .navbar .btn-primary:active {
        color: #fff;
        background: #33cabb !important;
        border: none;
    }	
    .navbar .btn-primary:hover, .navbar .btn-primary:focus {		
        color: #fff;
        background: #31bfb1 !important;
    }
    .navbar .social-btn .btn, .navbar .social-btn .btn:hover {
        color: #fff;
        margin: 0;
        padding: 0 !important;
        font-size: 13px;
        border: none;
        transition: all 0.4s;
        text-align: center;
        line-height: 34px;
        width: 47%;
        text-decoration: none;
    }
    .navbar .social-btn .facebook-btn {
        background: #507cc0;
    }
    .navbar .social-btn .facebook-btn:hover {
        background: #4676bd;
    }
    .navbar .social-btn .twitter-btn {
        background: #64ccf1;
    }
    .navbar .social-btn .twitter-btn:hover {
        background: #4ec7ef;
    }
    .navbar .social-btn .btn i {
        margin-right: 5px;
        font-size: 16px;
        position: relative;
        top: 2px;
    }
    .or-seperator {
        margin-top: 32px;
        text-align: center;
        border-top: 1px solid #e0e0e0;
    }
    .or-seperator b {
        color: #666;
        padding: 0 8px;
        width: 30px;
        height: 30px;
        font-size: 13px;
        text-align: center;
        line-height: 26px;
        background: #fff;
        display: inline-block;
        border: 1px solid #e0e0e0;
        border-radius: 50%;
        position: relative;
        top: -15px;
        z-index: 1;
    }
    .navbar .action-buttons .dropdown-toggle::after {
        display: none;
    }
    .form-check-label input {
        position: relative;
        top: 1px;
    }
    @media (min-width: 1200px){
        .form-inline .input-group {
            width: 300px;
            margin-left: 30px;
        }
    }
    @media (max-width: 768px){
        .navbar .dropdown-menu.action-form {
            width: 100%;
            padding: 10px 15px;
            background: transparent;
            border: none;
        }
        .navbar .form-inline {
            display: block;
        }
        .navbar .input-group {
            width: 100%;
        }
    }
    </style>
    <script>
    // Prevent dropdown menu from closing when click inside the form
    $(document).on("click", ".action-buttons .dropdown-menu", function(e){
        e.stopPropagation();
    });
    </script>
  
</head>
<body>
 <?php 
  include "component/header.php";
  if(!$user){ 
    print "
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
   <script>
   Swal.fire({
     title: 'Erreur',
     text: 'corddnnes non valide',
     icon: 'error',
     confirmButtonText: 'Ok'
   })   
    </script>";}
  ?>
 
    <!-- Main   -->
    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
        <div class="action-form">
            <form action="Login.php" method="post">
            
                <div class="form-group">
                    <input  type="email" class="form-control" placeholder="Username" name="email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password"  name="mdp" required="required">
                </div>
                <input  type="submit" style="background-color:#33cabb" class="btn btn-default sign-up-btn btn-block" value="login">
                <div class="text-center mt-2">
                    <a href="#">mot de passe oublier ?</a>
                </div>
            </form>
        </div>
    </div>
      
    <!-- Footer -->
    <?php 
  include "component/footer.php";
 ?>
  <!-- Footer -->
 </body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js" integrity="sha512-ySDkgzoUz5V9hQAlAg0uMRJXZPfZjE8QiW0fFMW7Jm15pBfNn3kbGsOis5lPxswtpxyY3wF5hFKHi+R/XitalA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
