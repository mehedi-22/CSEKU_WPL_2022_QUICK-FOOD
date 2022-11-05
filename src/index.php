<?php error_reporting(0); ?>

<?php

session_start();
require_once "./hndlComment.php";


try{
   $phone = $_SESSION['phone'] ;
         
}catch(Exception $e){

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet" />
      
    <link rel="stylesheet" href="../dist/css/general.css" />
    <link rel="stylesheet" href="../dist/css/style.css" />
    <link rel="stylesheet" href="../dist/output.css" >
    
 
  </head>
  <body class="bg-white w-screen">
    
  
  <header class="header">
<ul class="main-nav-list">
  <li><a class="main-nav-link text-sm" href="#">Quick Food </a></li>
</ul>

<nav>
  <ul class="main-nav-list">
    <li><a class="main-nav-link" href="index.php">Home</a></li>
    <li><a class="main-nav-link" href="./food.php">Menu</a></li>
    <li><a class="main-nav-link" href="./customerRivew.php">Review</a></li>
    <li><a class="main-nav-link" href="./payment.php">payment</a></li>
    <li><a class="main-nav-link" href="./checkout.php">Cart</a></li>
  <?php
    if($phone==null){
    echo '    <li><a class="main-nav-link nav-cta" href="sigup.php">SIGN IN</a></li>';
  }  
  else{
    echo '    <li><a class="main-nav-link nav-cta" href="sigup.php">SIGN OUT</a></li>';
   

  }
  ?>
  </ul>
</nav>
</header>




    <div class="" relative>
          <div class="absolute " style="top:22%;left:13%">
            <div class="text-4xl font-bold">Quick Food</div>
            <div class="text text-2xl font-bold">
              Time to enjoy our delicious Food.
            </div>
            <br>
            <span
              class="px-3  py-2 mt-13 hover:bg-red-500 rounded-md text-white bg-red-600"
            >
              ORDER NOW
            </span>
          </div>
          <div class="flex justify-center">
        <div class="flex-col  w-1/2">
          
        </div>

        <img style="height: 449px" src="../images/bgimg.png" />
      </div>


<!-- make  -->
<div class=" py-32 bg-gray-50 overflow-hidden p-10 flex gap-9 justify-center text-center mx-auto" style="margin-bottom:70px ;">
  

           <div class="w-60 shadow-md bg-white rounded-md  border border-gray-200">
                  <img class="" src="../images/reviewImg/reviewImage-01.png" alt="">
                  <div class="p-3 ">
                    <strong class=" text-xl pb-6 ">
                      We offer Best Food in town
                    </strong>
                    
                  </div>
                   
           </div>
           
           <div class="w-60 shadow-md bg-white rounded-md  border border-gray-200">
            <img class="" src="../images/reviewImg/reviewImage-02.png" alt="">
            <div class="p-3">
              <strong class=" text-xl pb-6 ">
                With us you got fast delivery
              </strong>
              
            </div>
             
     </div>


     <div class="w-60  shadow-md bg-white rounded-md   border border-gray-200">
      <img class="" src="../images/reviewImg/reviewImage-03.png" alt="">
      <div class="p-3 ">
        <strong class=" text-xl pb-6 ">
          Satisfy our Customer is our first priority
      </strong>
      
        
      </div>
       
</div>


</div>

      
    </div>


    <div class="testimonials">
      <div class="inner">
        <h1 class="text-lg" style="font-size: 40px;">Testimonials</h1>
        <div class="borderr"></div>
        <div class="row">
          <div class="col">
            <div class="testimonil shadow-xl rounded-md pt-10">
              <div class=""><?php echo getComment(1) ?></div>

            </div>
          </div>
          <div class="col">
            <div class="testimonil shadow-xl rounded-md pt-10">
              <div class="  "><?php echo getComment(2) ?></div>

            </div>
          </div>
          <div class="col">
            <div class="testimonil shadow-xl rounded-md pt-10">
              <div class=""><?php echo getComment(3) ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <footer class="footer">
      <div class="container grid grid--footer">
        <div class="logo-col">
          <a href="#" class="footer-logo">
            <img class="logos" alt="Omnifood logo" src="../images/q.jpg" />
          </a>
        </div>
        <div class="address-col">
          <p class="footer-heading">Contact us</p>
          <address class="contacts">
            <p class="address">
              Khulna university,Khan jahan ali Hall, 2nd Floor, Khulna, CA 94107
            </p>
            <p>
              <a class="footer-link" href="tel:415-201-6370">415-201-6370</a
              ><br />
              <a class="footer-link" href="mailto:hello@quickfood.com"
                >hello@quickfood.com</a
              >
            </p>
          </address>
        </div>
        <nav class="nav-col">
          <p class="footer-heading">Account</p>
          <ul class="footer-nav">
            <li><a class="footer-link" href="#">Sign in</a></li>
            <li><a class="footer-link" href="#">iOS app</a></li>
            <li><a class="footer-link" href="#">Android app</a></li>
          </ul>
        </nav>

        <nav class="nav-col ">
          <p class="footer-heading">Company</p>
          <ul class="social-links">
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-instagram"></ion-icon
              ></a>
            </li>
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-facebook"></ion-icon
              ></a>
            </li>
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-twitter"></ion-icon
              ></a>
            </li>
          </ul>

          <p class="copyright">
            Copyright &copy; 2025 by Quick Food, Inc. All rights reserved.
          </p>
        </nav>
      </div>
    </footer>
  </body>
</html>
<!-- 
      <div class=" ">
        <div class="flex justify-around  py-12">
          <div class="">
              <input type="text" placeholder="search" class="p-3 rounded-full  text-center " />  
          
          </div>
          <div class="flex gap-4">
            <button class="  hover:bg-red-500 hover:text-white px-3  border rounded-full text-black">pasta</button>
            <button class="  hover:bg-red-500 hover:text-white px-3  border rounded-full text-black">pitza</button>
            <button class="  hover:bg-red-500 hover:text-white px-3  border rounded-full text-black">Burger</button>
          </div>
        </div> -->