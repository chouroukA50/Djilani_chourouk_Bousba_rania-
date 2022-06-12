
<?php

include 'configg.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Admin Panneau</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">tableau de bord</h1>

   <div class="box-container">

    

      <div class="box">
         <?php 
            $select_articles = mysqli_query($conn, "SELECT * FROM `articles`") or die('query failed');
            $number_of_articles = mysqli_num_rows($select_articles);
         ?>
         <h3><?php echo $number_of_articles; ?></h3>
         <p>Articles ajouté</p>
      </div>


      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `réservation`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Résérvation passée</p>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `donneur`  ") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>Compte donneur</p>
      </div>
      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `donneur`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Totaux des comptes</p>
      </div>


    

   </div>

</section>

<!-- admin dashboard section ends -->

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>