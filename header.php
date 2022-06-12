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
   <div class="header-2">
      <div class="flex">          
         <a href="#" class="logo"> Donner <small> mieux que </small> Jeter </a>

         <nav class="navbar">
            <a href="home2.php" class="fa-solid fa-house"> <i>Accueil</i>  </a>
            <a href="medicaments&pharmaceutiques.php" class="fa fa-plus-square"> <i> Médecaments et Pharmaceutiques</i></a> 
            <a href="donneurs.php"class="fa fa-user-md" ><i> Pharmacies</i></a>      
         </nav>   

            <div class="icons">
            <a href="search_page.php" class="fas fa-search"></a>
            <a href="login.php" class="fa-solid fa-user"></a>
               
            </div>
      </div> 
      </div>
</header>