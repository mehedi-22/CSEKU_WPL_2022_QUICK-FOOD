<?php  
    require_once('nav.php');  
    session_start();
    require_once('./testQuery.php');
    require_once('../Database/Connection.php');
   
    $phone = $_SESSION['phone'] ;
    $email = $_SESSION['email'] ?? "session email";
    $userName = $_SESSION['name'] ?? "session Name";
    if($phone==null){
      header("location:index.php");
    }    
    if( isset($_POST['submit'])){
        $_POST['review'];
        $orderId = $_POST['orderId'];
        $review = $_POST['review'];
        $date = date('Y-m-d H:i:s');
        $query = new TestQuery(Connection::make());
        $query->insertNew("reviews",[$orderId,$userName,$phone,$email,$review,$date]);
        header("location:index.php");
    }

?>

<body class=" bg-gray-50 ">
   <div class="flex justify-center ">
    <div class=" my-11 py-12 drop-shadow-md bg-white px-10 w-1/2 flex flex-col justify-center ">
            <div class=" mb-10 font-semibold text-xl ">
                <pre>Name : <?php echo $userName ?></pre>
                <pre>Email : <?php echo $email ?></pre>
            </div>

            <div class=" px-5  ">
                <form action="customerRivew.php" method="post" enctype="multipart/form-data">
                    <pre>Order ID :</pre>
                    <input type="text" name="orderId" placeholder="order ID..." class=" border-gray-300 rounded-full border text-center font-light text-sm mx-5 px-5 py-2 w-full">
                     
                    <textarea 
                        class="border-gray-300 border my-7 " 
                        placeholder="review..."
                        name="review"
                        cols="80" rows="10"    
                    >  
                    </textarea>
                    <input class="  my-3 block rounded-md w-full  text-white bg-green-400 py-2 border border-gray-400" type="submit" value="upload" name="submit">

                </form>
            </div>
    </div> 
   </div>


</body>
</html>