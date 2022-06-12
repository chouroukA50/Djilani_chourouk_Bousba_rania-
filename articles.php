
<?php 

@include 'donneur_ajouter_articles_config.php';

session_start();
if(isset($_POST['ajouter_articles'])){
   $product_name = $_POST['article_name'];
   $product_numbre = $_POST['article_numbre'];
   $product_image = $_FILES['article_imag']['name'];
   $product_image_tmp_name = $_FILES['article_imag']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   $id_don=$_SESSION['id'];

   

 
   if(empty($product_name) || empty($product_numbre) || empty($product_image)){
      $message[] = 'merci de tout remplir';
   }else{
      $insert = "INSERT INTO articles( art_name ,numbre,imag,id_don) VALUES('$product_name','$product_numbre' ,'$product_image','$id_don') ";
      $upload = mysqli_query($conn,$insert); 
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'nouveau produit ajouté avec succès';
      }else{
         $message[] = "impossible d'ajouter l'article ";
      }
   }

};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `articles` WHERE id_art = '$delete_id' ") or die('query failed');
   header('location:articles.php');
}

?>
   <title>Donneur Ajouter Article </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
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

   <div class="donneur-product-form-container">


      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Ajouter un nouveau article</h3>
         <input type="text" placeholder="enter le nom d'article " name="article_name" class="box">
         <input type="number" placeholder="entrer le nombre d'article " name="article_numbre" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="article_imag" class="box">
    

         <input type="submit" class="btn" name="ajouter_articles" value="ajouter articles">

      </form>

   </div>

   <?php
   $id_don=$_SESSION['id'];

   $select = mysqli_query($conn, "SELECT * FROM `articles` where id_don=$id_don ");

   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th> Article image</th> 
            <th> Article nom</th>
            <th> Article nombre</th>
            <th> Action</th>
         </tr>
         </thead>

<?php 
foreach ($select as $key ) {
 ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $key['imag']; ?>" height="100" alt=""></td>
            <td><?php echo $key['art_name']; ?></td>
            <td><?php echo $key['numbre']; ?></td>
            <td>
               
               <a href="donneur_ajouter_articles_update.php?edit=<?php echo $key['id_art']; ?>" class="btn"> <i class="fas fa-edit"></i>    Éditer </a>
               <a href="articles.php?delete=<?php echo $key['id_art']; ?>" class="btn"> <i class="fas fa-trash"></i>     Supprimer </a>

            </td>
         </tr>

         <?php  
}

?>
      </table>
   </div>

</div>


</body>
</html>