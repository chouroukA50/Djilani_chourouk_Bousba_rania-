<?php
@include 'donneur_ajouter_articles_config.php';
session_start();
 
if(!isset($_SESSION['unique_id'])){
   header('location:login.php') ;
 
}

else
{
  
   header('location:articles.php') ;
}
?>



