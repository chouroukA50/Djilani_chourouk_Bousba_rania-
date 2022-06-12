<?php

include 'configg.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Donner mieux que jeter</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body> 
   


<?php include 'header.php'; ?>


<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>FAITE UN DON POUR UN MONDE SOLIDAIRE</h3>
      
    </div>


    <div class="video-container">
        <video src="images/donner mieux que jeter.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->


<section class="products">
   <h1 class="heading">
        <span>D</span>
        <span>E</span>
        <span>R</span>
        <span>N</span>
        <span>I</span>
        <span>E</span>
        <span>R</span>
        <span>S</span>
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
         $select_products = mysqli_query($conn, "SELECT * FROM `articles`, `donneur` where `id_don`=`id` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
       <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['imag']; ?>" alt="">
      <h6 class="name"><?php echo $fetch_products['art_name']; ?></h6>
      <div class="price"><?php echo $fetch_products['numbre']; ?></div>
      <h6 class="name"><?php echo $fetch_products['name']; ?></h6>


      <a href="visiteur_booking.php?id=<?php echo $fetch_products['id'] ?>" class="option-btn"> Reserver </a>

     </form>
      <?php
         }
      }else{
         echo '<p class="empty">aucun article ajouté pour le moment !</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="medicaments&pharmaceutiques.php" class="option-btn"> Afficher plus</a>
   </div>

</section>

<?php include 'footer.php'; ?>
<!-- js -->
<script src="js/script.js"></script>

</body>
</html>