<?php error_reporting(0); ?>
<?php 
include_once("function1.php");

require_once("../Database/Connection.php");
require_once("./testQuery.php");

$query = new TestQuery(Connection::make());
$dataAra = $query->fetchTransaction('transactions');
var_dump($data);




 session_start();
  try{
    $email = $_SESSION['emailID'];
    if($email==null){
      header("location:adminlogin.php");
      
    }
 }catch(Exception $e){

  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <link rel="stylesheet" href="../dist/css/customcss/admin.css" />
    <link rel="stylesheet" href="../dist/output.css"

   
    <title>Admin</title>
  </head>

  <body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa fa-user-o">Quick Food</h2>
        </div>
    
        <div class="sidebar-menu">
            <ul>
               
                <li><a href="admin1.php" class="active"><span>Home</span></a></li>
                <li><a href="../src/index.php" ><span>Client Page</span></a></li>
                <li><a href="./admin_page.php"><span>Add Food </span></a></li>
                <li><a href="./adminOrder.php"><span>Order Control </span></a></li>
                <li><a href="search.php"><span>Search</span></a></li>
                <li><a href="adminReview.php"><span>review</span></a></li>
                <li><a href="admin_food.php"><span>Home Poster</span></a></li>

                
            </ul>
        </div>
    </div>

    <div class="content">
        <main>
            <main>
                <div class="composant">
                <div class="ventes">
                    <div class="case">
                        <div class="header-case font-mono ">
                            <h2 class=" font-mono font-bold text-xl ">List of order</h2>
                            
                        </div>
                        <div class="body-case shadow-md">
                            <div class="tableau drop-shadow-lg ">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Transaction Id</td>
                                            <td>Address</td>
                                            <td>Phone</td>
                                            <td>Email</td>
                                            <td>Amount(Tk)</td>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($dataAra as $data): ?>  
                                        <tr>
                                        <td> <?php echo $data['Name'] ?></td>
                                        <td><?php echo $data['TRANSACTIONID'] ?></td>
                                        <td><?php echo  $data['Address'] ?></td>
                                        <td><?php echo  $data['Phone'] ?></td>
                                         <td><?php echo  $data['Email'] ?></td>
                                        <td><?php echo  $data['Total'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            
              
            
            
            </div>
        
        </main>
  </body>
</html>