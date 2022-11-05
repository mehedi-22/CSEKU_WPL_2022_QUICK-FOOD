<?php  
    require_once "./hndlPayment.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../tailwind.css">
    <link rel="stylesheet" href="../dist/css/general.css" />
    <link rel="stylesheet" href="../dist/css/style.css" />
</head>
<body>
    
        
       <section class=" bg-gray-50 w-screen h-full">
       <?php  require('nav.php')    ?>
          <!--  -->

        <nav class=" flex justify-center gap-2 p-4">
            <a href="./payment_bksh.php" class=" bg-green-400 border drop-shadow-lg text-sm p-2 rounded-lg text-white">Bkash</a>
            
            <a href="./payment_rckt.php" class=" bg-green-400 border drop-shadow-lg text-sm p-2 rounded-lg text-white">Rocket</a>
            
            <a href="././payment_nagad.php" class=" bg-green-400 border drop-shadow-lg text-sm p-2 rounded-lg text-white">Nagad</a>
            
        </nav>

           <div class="flex mx-auto justify-center w-1/2 ">
                   <img src="../images/rocket.png" alt="">
           </div>   
           
           <?php include_once "./paymentTemplate.php"?>

       </section>
</body>
</html>