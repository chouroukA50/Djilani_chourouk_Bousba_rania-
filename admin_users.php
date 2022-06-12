<?php

include 'configg.php';

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `donneur` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>
<html lang="en">
<head>
   <title>Donneurs</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> Donneurs </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `donneur`WHERE email !='admin1@gmail.com'") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> Id donneur: <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> Nom de pharmacie : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> Adress : <span><?php echo $fetch_users['adress']; ?></span> </p>
         <p> Numéro de téléphone : <span><?php echo $fetch_users['numero']; ?></span> </p>

         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('supprimer ce pharmacie');" class="delete-btn"> supprimer </a>
      </div>

      <?php
         };
      ?>
      
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>