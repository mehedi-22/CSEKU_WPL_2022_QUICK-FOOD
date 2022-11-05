<?php error_reporting(0); ?>

<?php 
require_once "../Database/Connection.php";
require_once "./testQuery.php";
require_once "./function1.php";

session_start();

try{
  $email = $_SESSION['email'];
  if(!$email){
    header("location:index.php");
    
  }

}catch(Exception $e){
  var_dump($e);
}
 
// echo $_SESSION['email'];

    $query = new TestQuery(Connection::make());
        //$orderProducts = $query->fetchAll("cart");
         $email = $_SESSION['email'];
         $orderProducts = $query->customQuery("select * from cart where userId = '$email' ");
        $orderInformation = "";
        $total = 0;
        // var_dump($orderProducts);
        foreach($orderProducts as $product){
             $quantity = strval($product["quantity"]);
             $producrName = $product["name"];
             $price = $product["price"];
             $orderInformation = $orderInformation ."#".$producrName . "( $quantity )\t";
             $total = $total + intval($price) * intval($quantity);
        }
        
       $orderInformation;
        
        $_SESSION['name'] ;
        // print_r($_SESSION['emailID']);

    if(isset($_POST['submit'])){
        echo "i am in";
        $name = $_SESSION['name'] ?? "unknown";
        $email = $_SESSION["email"] ?? "unknown";
        $transactionId = $_POST["transactionId"] ?? "unknown";
        $address = $_POST["address"] ?? "unknown";
        $phone = $_POST["phone"] ?? "unknown";
        

        $products = $orderInformation;
        $dateAndTime = date('Y-m-d H:i:s');
        try{
            $query->insertNew(
                "transactions",[$name,$email,$transactionId,$address,$phone,$products,$total,$dateAndTime]
            );

            $query->deleteTable('cart');


            header("Location: http://localhost/src/");

        }catch(PDOException $e){

        }
        
    }
    



?>