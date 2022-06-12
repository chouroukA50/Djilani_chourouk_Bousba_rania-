<?php

include 'configg.php';

session_start();

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `réservation` WHERE id_res = '$delete_id'") or die('query failed');
   header('location:Reservation.php');
}

?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Les réservations faites</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   

<section class="users">

   <h1 class="title">Réservation</h1>

   <div class="box-container">
      <?php
      

         $id_don=$_SESSION['id'];

      $select_orders = mysqli_query($conn, "SELECT * FROM `réservation` WHERE id_don='$id_don'") or die('query failed'); 
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">

         <p> nom : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> nombre : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> phone : <span><?php echo $fetch_orders['phone']; ?></span> </p>
         <p> cause de réservation : <span><?php echo $fetch_orders['message']; ?></span> </p>
         <p> date : <span><?php echo $fetch_orders['date']; ?></span> </p>
         <p> heure : <span><?php echo $fetch_orders['heure']; ?></span> </p>
         <p> nom d'article : <span><?php echo $fetch_orders['articles_nom']; ?></span> </p>
         
      
       <form action="" method="post">
     
            <a href="Reservation.php?delete=<?php echo $fetch_orders['id_res']; ?>" onclick="return confirm('supprimer cette réservation?');" class="delete-btn"> Supprimer </a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">pas encore de réservation passées !</p>';
      }
      ?>
   </div>

</section>
<!-- js  -->
<script src="js/admin_script.js"></script>

</body>
</html>