<?php

@include 'donneur_ajouter_articles_config.php';

$id = $_GET['edit'];

if(isset($_POST['mettre_a_jour_article'])){

   $product_name = $_POST['article_name'];
   $product_numbre = $_POST['article_numbre'];
   $product_image = $_FILES['article_imag']['name'];
   $product_image_tmp_name = $_FILES['article_imag']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) && empty($product_numbre) && empty($product_image)){
      $message[] = 'merci de tout remplir !';    
   }else{

      $update_data = "UPDATE articles SET art_name ='$product_name', numbre='$product_numbre', imag='$product_image'  WHERE id_art = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:donneur_ajouter_articles.php');
      }else{
         $$message[] = 'merci de tout remplir !'; 
      }

   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/style_donneur_ajouter_articles.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">
<div class="donneur-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM articles WHERE id_art = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">mettre à jour le produit</h3>
      <input type="text" class="box" name="article_name" value="<?php echo $row['art_name']; ?>" placeholder="entrer article nom">
      <input type="number" min="0" class="box" name="article_numbre" value="<?php echo $row['numbre']; ?>" placeholder="entrer article nombre ">
      <input type="file" class="box" name="article_imag"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="mettre à jour l'article" name="mettre_a_jour_article" class="btn">
      <a href="donneur_ajouter_articles.php" class="btn">retourner!</a>
   </form>
   
   <?php }; ?>
</div>

</div>

</body>
</html>