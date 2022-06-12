<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panneau</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Accueil</a>
         <a href="admin_users.php">Donneurs</a>

      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
 
         <a href="logout.php" class="delete-btn">Déconnexion </a>

      </div>

   </div>

</header>