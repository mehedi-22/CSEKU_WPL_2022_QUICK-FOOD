<?php error_reporting(0); ?>

<?php 
include("function1.php");
session_start();
  try{
    $email = $_SESSION['email'];
    if($email==null){
      header("location:adminlogin.php");
      
    }
 }catch(Exception $e){

  }

$confirmObj = new QuickFood();

if (isset($_GET['status'])){
   if($_GET['status']='confirm'){
    $id = $_GET['id'];
   
   $Confirm_message = $confirmObj->confirmation_messaage($id);
  // $delivery = $confirmObj->deliveryMove($id);
   }
 }
 if (isset($_GET['status'])){
  if($_GET['status']='confirm'){
   $id = $_GET['id'];
  
  $delivery = $confirmObj->deliveryMove($id);
 // $x=$confirmObj->deliverydelete($id);

  }
}


if (isset($_POST['search'])){
  $value = $_POST['search'];
  $Orderdata = $confirmObj->searcheDelivery($value);
 
}
else{
  $Orderdata  = $confirmObj-> DeliveryDetails();
  
}

require_once("../Database/Connection.php");
require_once("./testQuery.php");

$query = new TestQuery(Connection::make());
$transaction = $query->admin_fetchConfirmTransaction();

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>orderControl</title>

    <link rel="stylesheet" href="../dist/css/customcss/style1.css" />
  </head>
  <body>
 
    <div class="container">
    <div class="form_control search" style="background-color: white;">
        <form action="adminOrder.php" method="POST" enctype="multipart/form-data">
          <h3>Delivery <?php echo $x ?></h3>
          <input
            type="text"
            placeholder="Search...."
            name="search"
            value=""
            class="box"
          />
        
          <button  class="btn" type="submit">
          Search
          </button>
        
          
        
        
          <a href="admin1.php" class="btn">Home</a>
        </form>   
      </div>
      <div class="table_container">
        <table class="td">
          <thead>
            <tr>
              <th style="width: 20px">Transaction</th>
              <th style="width: 20px">Phone</th>
              <th style="width: 20px">Address</th>
              <th  >Details of Food </th>
              
            </tr>
          </thead>
          <tbody>
            <?php // while($data = mysqli_fetch_assoc( $Orderdata )){ ?>
              <?php foreach($transaction as $data): ?>

          <tr> 
            <td> <?php echo $data['TRANSACTIONID'] ?></td>
            <td ><?php echo $data['Phone'] ?></td>
            <td ><?php echo $data['Address'] ?></td>
            <td ><?php echo $data['Product'] ?></td>
           
          </tr>
          <?php // } ?>
          
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
  <script>
  function checkedelet(){
    return confirm('Are you sure you want to delete this food?');
    
  
  }
</script>
</html>