

<title>compte de donneur</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style_donneur.css">

</head>
<body>
    
<!-- header section starts  -->
<?php

include 'configg.php';
session_start();
if (isset($_SESSION['unique_id'])){

    $unique_id=$_SESSION['unique_id'];

    $select = mysqli_query($conn, "SELECT * FROM `donneur` WHERE unique_id=$unique_id ");
    
    ?> 
    <?php


    Foreach($select as $result ) { 
        ?>
<header>
    <div class="user">
    <img src="images/<?php echo $result['image'];?>" alt="">
            <h3 class="name"> <?php echo $result ['name'];?></h3>
        
    </div>

    <nav class="navbar">
        <ul>
            
        <li><a href="donneur_page.php"> À propos de moi    <i class="fas fa-user"></i></a></li>  
        
        
            <li><a href="donneur_ajouter_articles.php" class="btn">Ajouter un article </a></li>

            <li><a href="Reservation.php?id=<?php echo $result['id'] ?>">Réservation</a></li>

            <li> <a href="logout.php" class="delete-btn">Se déconnecter</a></li>
           
        
      
        </ul>
    </nav>

</header>


<section class="Accueil" id="Accueil">

    
    
        <div>
        <h1> <span>Donner mieux que jeter</span></h1>
          
            <h3>Faite un don pour un monde solidaire</h3>
        </div>


</section>
<?php 
    }	
    
    ?>
    <?php
    }
   else{
        header('location:login.php');
   }

   ?>





<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>
