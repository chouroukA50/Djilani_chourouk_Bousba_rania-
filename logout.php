<?php

include 'configg.php'; 

session_start();  
session_unset();
session_destroy();

header('location:home2.php'); 

?>