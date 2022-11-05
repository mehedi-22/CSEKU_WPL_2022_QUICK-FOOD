<?php error_reporting(0); ?>
<?php 
include("function1.php");

session_start();
  try{
    $email = $_SESSION['emailID'];
    if($email==null){
      header("location:adminlogin.php");
      
    }
 }catch(Exception $e){

  }

$foodobj = new QuickFood();



if (isset($_GET['status'])){
  if($_GET['status']='delete'){
   $id = $_GET['id'];
  $food = $foodobj->food_delete($id);
  }


}

if (isset($_POST['search'])){
    $value = $_POST['search'];
    $fooddata = $foodobj->searchFood($value);
   
 }
else{
 $fooddata = $foodobj->food_display();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin_page</title>
    
    <link rel="stylesheet" href="../dist/output.css" /> 
    <link rel="stylesheet" href="../dist/css/customcss/style1.css" />
   
  </head>
  <body>
  <?php  require('admin_nav.php')    ?>
    <div class="container">
      <div class="form_control search">
        <form action="search.php" method="POST" enctype="multipart/form-data">
          <h3>Search Food </h3>
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

          <a href="admin1.php" class="btn">HOME</a>
          
        </form>   
      </div>
      <div class="table_container">
        <table class="td drop-shadow-md ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Details</th>
              <th>Availabiliy </th>
              <th>price</th>
              <th>Quantity</th>
              <th>Image</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($food = mysqli_fetch_assoc( $fooddata )){ ?>
          <tr>
           
            <td> <?php echo $food['foodID'] ?></td>
            <td><?php echo $food['foodName'] ?></td>
            <td><?php echo $food['details'] ?></td>
            <td><?php echo $food['availability'] ?></td>
            <td><?php echo $food['price'] ?></td>
            <td><?php echo $food['quantity'] ?></td>
            <td>
              <img src="./upload/<?php echo $food['image'] ?>" height="100" alt="" style="max-width: 70px;"/>
            </td>
            <td>
              <a href="admin_update.php? status=edit&&id=<?php echo $food['foodID'] ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
              <a href="?status=delete&&id=<?php echo $food['foodID'] ?>" class="btn" onclick = 'return checkedelet()'>  delete </a>
            </td>
          </tr>
          <?php } ?>
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