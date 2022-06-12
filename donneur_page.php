
<html>
	<head>
		<title> User Profile </title>
		<link rel="stylesheet" href="style.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
	</head>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: 'Poppins',sans-serif;
		}
		body{
			background-image: url('images/pharmacie-avec-le-pharmacien-et-client-dans-compteur-illustration-de-vecteur-conception-personnage-dessin-animé-médecine-fond-151280416.jpg');
			background-size: cover;
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			height: 100vh;
		}
		.profile-card{
			width: 516px;
			margin: auto;
			margin-top: 12px;
			margin-bottom: 12px;
			background: #ffffffd9;
			border-radius: 10px;
			opacity: 0.98;
			font-weight: 800;
			box-shadow: 2px 4px 10px 2px rgba(0, 0, 0, 0.5);
			position: relative;
		}
		.image-container{
			position: relative;
		}
		.image-container img{
			width: 29%;
			border-radius: 50%;
			margin-top: 15px;
			margin-left: 190px;
			height: 152px;
		}
		.title{
			position: absolute;
			left: 183px;
			top: 170px;
			font-size: 17px;
			font-weight: 700;
			color: #292525;
			text-shadow: #FC0 1px 0  10px;
		}
		.main-container{
			padding: 32px 20px 20px 20px;
		}
		.info{
			color: black;
			margin-right: 16px;
			padding: 14px;
		}
	</style>
	
<body>

<?php

include 'configg.php';
session_start();
$unique_id=$_SESSION['unique_id'];

$select = mysqli_query($conn, "SELECT * FROM `donneur` WHERE unique_id=$unique_id ");




Foreach($select as $result ) { 
	?>

<div class="profile-card">
	<div class="image-container">
		<img src="images/<?php echo $result['image'];?> ">
		

		<div class="title">

			<h3 class="name"> <?php echo $result ['name'];?> </h3>
		</div>
	</div>
	<div class="main-container">
		<h2 class="adress"> <i class="fa fa-map-marker info"></i>    <?php echo $result['adress'];?></h2>
		<h2 class="email"><i class="fa fa-envelope info"> </i> <?php echo $result['email'];?> </h2>
		<h2 class="numéro"><i class="fa fa-phone info"></i>  <?php echo $result['adress'];?></h2>

		

	
		
		
	</div>
</div>

<?php 
}	

?>


</body>
</html>