<?php

include 'configg.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Médecaments et Pharmaceutiques </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
<section class="products">

<div class="heading">
<h1 class="heading">
        <span>A</span>
        <span>R</span>
        <span>T</span>
        <span>I</span>
        <span>C</span>
        <span>L</span>
        <span>E</span>
        <span>S</span>
    </h1>

   <div class="box-container">
   <?php  

         $select_products = mysqli_query($conn, "SELECT * FROM `articles`, `donneur` WHERE email !='admin1@gmail.com' AND id_don=id  ") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
       <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['imag']; ?>" alt="">
      <h6 class="name"><?php echo $fetch_products['art_name']; ?></h6>
      <div class="price"><?php echo $fetch_products['numbre']; ?></div>
      <h6 class="name"><?php echo $fetch_products['name']; ?></h6>

      
      <a href="visiteur_booking.php?id=<?php echo $fetch_products['id'] ?>" class="option-btn">reserver </a>

      
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">aucun produit ajouté pour le moment !</p>';
      }
      ?>
   </div>

</section>
<!-- js -->
<script src="js/script.js"></script>

</body>
</html>