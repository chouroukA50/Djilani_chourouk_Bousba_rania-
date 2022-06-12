
<?php

include 'configg.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `donneur` WHERE email = '$email' AND pass = '$pass'") or die('query failed');


   if(mysqli_num_rows($select) > 0){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

      if (($email == 'admin1@gmail.com') && ($pass == md5('123'))){
      

         $_SESSION['admin_name'] = $POST['name'];
         $_SESSION['admin_email'] = $POST['email'];

         header('location:admin_page.php');
      }  
else{
        $row = mysqli_fetch_assoc($select);
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['unique_id'] =$row['unique_id'];
      $_SESSION['id'] = $row['id'];


      header('location:donneur.php'); 
}


   }else{
      $message[] = 'email ou mot de passe incorrect!';
   }

}

?>

<head>
   <title>Connexion</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Connexion</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="entrer votre email" class="box" required>
      <input type="password" name="password" placeholder="entrer votre mot de pass" class="box" required>
      <input type="submit" name="submit" value="Connexion" class="btn">
      <p>vous n'avez pas de compte ? <a href="register.php">incsription</a></p>
   </form>

</div>

</body>
</html>