<?php error_reporting(0); ?>
<?php 

session_start();

try{
  if (isset($_SESSION['phone']))
      $phone = $_SESSION['phone'] ;
      

}catch(Exception $e){
   
}

if($phone==null){
  header("location:index.php");
}  

$totalPrice = 0;
 require './makeOrder.php'

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../dist/css/customcss/checkout.css">
    <script defer src="../script/addListener.js"></script>
  
    <title>Checkout </title>
</head>

<body>

<header class="header">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="#">Quick Food</a></li>
      </ul>

      <nav>
        <ul class="main-nav-list">
          <li><a class="main-nav-link" href="./index.php">Home</a></li>
          <!-- <li><a class="main-nav-link" href="#">Request Order</a></li> -->
          <li><a class="main-nav-link" href="./food.php">Menu</a></li>
          <li><a class="main-nav-link" href="checkout.php">Cart</a></li>
          <?php
         if($phone==null){
            echo '<li><a class="main-nav-link nav-cta" href="sigup.php">SIGN IN</a></li>';
         }
         else{
            echo '<li><a class="main-nav-link nav-cta" href="sigup.php">SIGN OUT</a></li>';
            
         }
          ?>
        </ul>
      </nav>
    </header>

    <div class="table">
        <!-- <a class='empty' href="">Clear Cart</a> -->
        <!--                                           temp -->
         <?php include './queryBuilder.php' ?>        
        <table style="border-bottom: 1px #e3e3e3 solid; margin-bottom:20px;">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>   
                     
                    <?php foreach($foodsIncart as $food): ?>
     
                    <tr  class="order ">
             
                        <td> <?php  echo $food['name']  ?></td>
                        <td >
                          <span food-id="<?php echo $food['productId'] ?>"  class="gQuantity"><?php  echo $food['quantity']  ?></span>
                          <button class="increment">+</button>
                          <button class="decrement">-</button>
                        </td>
                        
                        <td class="price"><?php  echo $food['price']  ?> tk</td>
                        <td><button data-id="<?php  echo $food['productId']  ?>" class="gBtn"><i class="fas fa-times"></i> remove</button></td>
                    </tr>
                    <?php  $totalPrice = $totalPrice + $food['price']  ?>
                    <?php endforeach ?>
                   
        </table>
        
        <div class="total" style="float: right;">
            <span class="g-total">Total Tk <?php echo $totalPrice ?> </span>tk/-
                    </br>
             <button class = "button">
               Place Order
             </button>
            <!-- <button class = "button" type="submit" name="order">
               
            </button> -->
        </div>
    </div>
    
    

    <!-------------->
   
</body>


</html>