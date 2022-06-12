<?php

include 'configg.php';


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $adress = mysqli_real_escape_string($conn, $_POST['adress']);
   $numero = mysqli_real_escape_string($conn, $_POST['numero']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;



   $unique_id=rand(time(),100000);


   $select = mysqli_query($conn, "SELECT * FROM `donneur` WHERE email = '$email' AND pass = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'ce nom de pharmacie existe dejà!'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = "la taille de l'image est trop grand!";
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `donneur`(name, email, pass, image,  adress, numero,  unique_id) 
         VALUES('$name', '$email', '$pass', '$image','$adress','$numero','$unique_id')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'incription succés!';
            header('location:login.php');
         }else{
            $message[] = 'incription échec!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inscription</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Inscription</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter votre nom de pharmacie" class="box" required>
      <input type="email" name="email" placeholder="enter votre email" class="box" required>
      <input type="password" name="password" placeholder="enter votre mot de pass" class="box" required>
      <input type="password" name="cpassword" placeholder="confirmer le mot de pass" class="box" required>

      <input type="text" name="numero" placeholder="enter votre numero" class="box" required>
      <input type="text" name="adress" placeholder="enter votre adress" class="box" required>

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">



      <input type="submit" name="submit" value="inscription" class="btn">
      <p>Vous avez déjà un compte? <a href="login.php">Connexion</a></p>
   </form>

</div>

</body>
</html>