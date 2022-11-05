<?php error_reporting(0); ?>
<?php 
include("function1.php");
/*
session_start();
  try{
    $email = $_SESSION['email'];
    if($email==null){
      header("location:../src/adminlogin.php");
      
    }
 }catch(Exception $e){

  }
*/
$reviews = new QuickFood();



if (isset($_GET['status'])){
  if($_GET['status']='delete'){
   $id = $_GET['id'];
  $message = $reviews->review_delete($id);
   
}


}

if (isset($_POST['search'])){
    $value = $_POST['search'];
    $review = $reviews->searchReview($value);
   
 }

else{
 $review = $reviews->review_display();

 
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>review</title>
    <link rel="stylesheet" href="../dist/output.css" /> 

    <link rel="stylesheet" href="../dist/css/customcss/style1.css" />
   
  </head>
  <body>
  <?php  require('admin_nav.php')    ?>

    <div class="container">
      <div class="form_control search">
        <form action="search.php" method="POST" enctype="multipart/form-data">
          <h3>Search Transaction </h3>
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
        <table class="td shadow-md ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
             <th>Email </th>
              <th>Review</th>
              <th>action</th>
              
            </tr>
          </thead>
          <tbody>
            <?php while($r = mysqli_fetch_assoc( $review )){ ?>
          <tr>
           
            <td> <?php echo $r['orderId'] ?></td>
            <td><?php echo $r['username'] ?></td>
            
             <td><?php echo $r['phone'] ?></td>
             <td><?php echo $r['email'] ?></td>
            <td><?php echo $r['review'] ?></td>
            
            
            <td>
              
              <a href="?status=delete&&id=<?php echo $r['orderId'] ?>" class="btn" onclick = 'return checkedelet()'>  delete </a>
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