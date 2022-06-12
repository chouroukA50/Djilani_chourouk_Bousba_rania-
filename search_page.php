<?php

include 'configg.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page de recherche</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h1 class="heading">
        <span>P</span>
        <span>A</span>
        <span>G</span>
        <span>E</span>
        <span>D</span>
        <span>E</span>
        <span>R</span>
        <span>E</span>
        <span>C</span>
        <span>H</span>
        <span>E</span>
        <span>R</span>
        <span>C</span>
        <span>H</span>
        <span>E</span>
    </h1>


</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="rechercher un article..." class="box">
      <input type="submit" name="submit" value="rechercher" class="btn">
   </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">
   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_products = mysqli_query($conn, "SELECT * FROM `articles` WHERE art_name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>
   <form action="" method="post" class="box">
      <img src="uploaded_img/<?php echo $fetch_product['imag']; ?>" alt="" class="image">
      <div class="name"><?php echo $fetch_product['art_name']; ?></div>
      <div class="price"><?php echo $fetch_product['numbre']; ?></div>
   
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['art_name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['numbre']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['imag']; ?>">
      <a href="visiteur_booking.php" class="btn">Reserver</a>
   </form>
   <?php
            }
         }else{
            echo '<p class="empty">aucun résultat trouvé!</p>';
         }
      }else{
         echo '<p class="empty">chercher quelque chose!</p>';
      }
   ?>
   </div>
  

</section>











<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>