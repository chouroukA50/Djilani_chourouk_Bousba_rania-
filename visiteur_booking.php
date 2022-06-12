<?php
if(isset($_GET['id'])){
 
   $connection = mysqli_connect('localhost','root','','donnation');

   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $message = $_POST['message'];
      $nombre = $_POST['nombre'];
      $date = $_POST['date'];
      $articles_nom = $_POST['articles_nom'];
      $book=$_GET['id'];
      
      $request = "INSERT INTO `réservation`(name, email, phone, number, message, date, articles_nom,id_don) 
      VALUES('$name','$email','$phone','$message','$nombre','$date','$articles_nom','$book') ";
      mysqli_query($connection, $request);

      header('location:home2.php'); 

   } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Réservation</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style_book.css">

</head>
<body>
<section class="booking">

   <form action="" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span> nom:</span>
            <input type="text" placeholder="entrer votre nom" name="name">
         </div>
         <div class="inputBox">
            <span> email: </span>
            <input type="email" placeholder="entrer votre email" name="email">
         </div>
         <div class="inputBox">
            <span> phone:</span>
            <input type="text" placeholder="entrer votre numéro de téléphone" name="phone">
         </div>
         <div class="inputBox">
            <span>cause de réservation :</span>
            <input type="text" placeholder="entrer la cause de votre réservation" name="message">
</div>
         <div class="inputBox">
            <span> nombre d'articles :</span>
            <input type="number" placeholder="nombre d'article" name="nombre">
         </div>
         
         <div class="inputBox">
            <span> vos commmandes:</span>
            <input type="name" placeholder="nom d'article" name="articles_nom">
         </div>
         <div class="inputBox">
            <span> date :</span>
            <input type="date" name="date">
         </div>

         <div class="inputBox">
            <span>heure :</span>
            <input type="heure" placeholder="l'heure de l'envois de l'article" name="l'heure de reservation">
         </div>

      </div>

      <input type="submit" value="résérver" class="btn" name="send">

   </form>

</section>
</body>
</html>