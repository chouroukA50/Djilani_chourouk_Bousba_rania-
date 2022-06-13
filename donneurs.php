
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pharmacies</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<?php

include 'configg.php';
session_start();


	?>

<div class="heading">
<section class="products">

<div class="heading">
<h1 class="heading">
        <span>D</span>
        <span>O</span>
        <span>N</span>
        <span>N</span>
        <span>E</span>
        <span>U</span>
        <span>R</span>
        <span>S</span>
    </h1>

   <div class="box-container">
   <?php  

   
         $select_products = mysqli_query($conn, "SELECT * FROM `donneur` WHERE email !='admin1@gmail.com' ") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($result = mysqli_fetch_assoc($select_products)){
               
      ?>

       <form action="" method="post" class="box">

      <img class="image" src="uploaded_img/<?php echo $result['image']; ?>" alt="">


      <h1 class="name"><?php echo $result['name']; ?></h1>
      <h1 class="adress"><?php echo $result['adress']; ?></h1>
      <br>
      <h1 class="email"><?php echo $result['email']; ?></h1>
      <br>
      <h1 class="numero"><?php echo $result['numero']; ?></h1>

      




     </form>
      <?php
         }
      }else{
         echo '<p class="empty"> aucun donneur ! </p>';
      }
      ?>
   </div>

</section>

<!-- js -->
<script src="js/script.js"></script>

</body>
</html>
