<?php error_reporting(0); 
session_start();


try{
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'];
  
  if(!$phone){
    header("location:index.php");
    
  }

}catch(Exception $e){
  var_dump($e);
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="../tailwind.css" />
    <link rel="stylesheet" href="../dist/css/general.css" />
    <link rel="stylesheet" href="../dist/css/style.css" />
    <link rel="stylesheet" href="../dist/output.css" />
  
    <script defer type="text/javascript" src="../script/manueScript.js"></script>
    <script defer type="text/javascript" src="../script/addToCart.js"></script>

  </head>
  <body>

<header class="header">
<ul class="main-nav-list">
  <li><a class="main-nav-link text-sm" href="#">Quick Food</a></li>
</ul>

<nav>
  <ul class="main-nav-list">
    <li><a class="main-nav-link" href="./index.php">Home</a></li>
    <li><a class="main-nav-link" href="./food.php">Menu</a></li>
    <li><a class="main-nav-link" href="./customerRivew.php">Review</a></li>
    <li><a class="main-nav-link" href="./payment.php">payment</a></li>
    <li><a class=" main-nav-link" href="./checkout.php">Cart
      <span  id="grabCart"></span>
    </a></li>
    <?php
    if($phone==null){
      echo '<li><a class="main-nav-link nav-cta" href="../src/sigup.php">SIGN IN</a></li>';
     
    }
    else{
      echo '<li><a class="main-nav-link nav-cta" href="../src/sigup.php">Sign out</a></li>';
      
    }
    ?>
    
  </ul>
</nav>
</header>