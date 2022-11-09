
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="navbar-brand" style="margin-left: 20px;">    <img src="Image/logo.png"  width="50px">        </a>  		
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">
 Home</a>
                <a href="#" class="nav-item nav-link">About</a>			
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Categories</a>
                    <div class="dropdown-menu">					
                      <?php foreach($categories as $category)
                      print  ' <a href="index.php?cat='.$category['ID'].'" class="dropdown-item">'.$category['nom'].'</a> '?>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <form action="index.php" method="POST"  class="navbar-form form-inline">
                <div class="input-group search-box">								
                    <input name="search" type="text" id="search" class="form-control" placeholder="Chercher...">
                    <div class="input-group-append">
                        <span class="input-group-text" >
                           <i class="material-icons">&#xE8B6;</i> 
                        </span>
                    </div>
                </div>
            </form>
            <div class="navbar-nav ml-auto action-buttons">
            <?php 
          if( isset( $_SESSION['nom'] ) ){ 
             
             print '  
        <div class="nav-item dropdown">
            <a href="profile.php"  class="btn btn-primary sign-up-btn"dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mon profile   </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item disabled"  href="#">'.$_SESSION['nom'].' '. $_SESSION['prenom'].'</a>
     <a class="dropdown-item" href="deconnect.php">Deconnexion</a>
  </div>
            </div>' ;}
        else{
           print ' <div class="nav-item dropdown">
            <a href="Login.php"  class="nav-item nav-link">Login</a>
  
       </div>
       <div class="nav-item dropdown">
           <a href="registre.php"  class="btn btn-primary sign-up-btn">Sign up</a>
       </div>';
        }
             ?>
           
        
            </div>
        </div>
    </nav>