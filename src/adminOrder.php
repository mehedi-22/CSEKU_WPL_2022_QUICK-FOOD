<?php error_reporting(0); ?>

<?php 

include("./function1.php");
require_once("../Database/Connection.php");
require_once("./testQuery.php");

// $query = new TestQuery(Connection::make());
// $dataAra = $query->fetchAll('transactions');
// var_dump($data);


// session_start();
//   try{
//     $email = $_SESSION['email'];
//     if($email==null){
//       header("location:../src/adminlogin.php");
      
//     }
//  }catch(Exception $e){

//   }
//asdassdasd

$query = new TestQuery(Connection::make());
$pendingTransaction = $query->admin_fetchPendingConfirmTransaction();
$transaction = $query->fetchConfirmTransaction($_SESSION["email"]);

///asdasd

$TransactinObj = new QuickFood();

if (isset($_GET['status'])){
  if($_GET['status']='delete'){
   $id = $_GET['id'];
  $food = $TransactinObj->OrderDelete($id);
  }
  else{
    echo "fgdhfhd";
  }


}
if (isset($_POST['search'])){
  $value = $_POST['search'];
  $Orderdata = $TransactinObj->searchTransaction($value);
 
}
else{
  $Orderdata  = $TransactinObj-> OrderDetails();
  //$foodobj->food_display();
}

//$Orderdata = $TransactinObj-> OrderDetails();
 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>orderControl</title>
    
    <link rel="stylesheet" href="../dist/output.css" /> 
    <link rel="stylesheet" href="../dist/css/customcss/style1.css" />

  </head>
  <body>
  <?php  require('admin_nav.php')    ?>
 
    <div class="container">
    <div class="form_control search" style="background-color: white;">
        <form action="adminOrder.php" method="POST" enctype="multipart/form-data">
          <h3>Search Order</h3>
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
        <table class="td drop-shadow-md ">
          <thead>
            <tr>
              <th style="width: 20px">Transaction</th>
              <th style="width: 20px">Phone</th>
              <th style="width: 20px">Address</th>
              <th  >Details of Food </th>
              <th style="width: 30px">action</th>
            </tr>
          </thead>
          <tbody>
            <?//php while($data = mysqli_fetch_assoc( $Orderdata )){ ?>
              <?php foreach($pendingTransaction as $data): ?>
          <tr> 
            <td> <?php echo $data['TRANSACTIONID'] ?></td>
            <td ><?php echo $data['Phone'] ?></td>
            <td ><?php echo $data['Address'] ?></td>
            <td ><?php echo $data['Product'] ?></td>
            <td>
             
              <a href="confirmation.php? status=edit&&id=<?php echo $data['TRANSACTIONID'] ?>" class="btnn">  Confirm </a>
             
            </td>
          </tr>
          <?//php } ?>
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
