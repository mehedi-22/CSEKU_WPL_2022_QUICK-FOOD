<?php error_reporting(0); ?>
<?php 
include("function1.php");

$clogin = new QuickFood();
$cobj = new QuickFood();

if (isset($_POST['login'])){
  $message = $clogin->adminlogin_info($_POST);
}

session_start();


  try{
    $email = $_SESSION['emailID'];
    if($email){
      header("location:admin1.php");
      
    }

  }catch(Exception $e){
    var_dump($e);
  }

 //session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
   
    <link rel="stylesheet" href="../dist/css/customcss/login.css" />
    <title>Login</title>
  </head>

  <body>
    <div class="container">
      <div class="container-con">
        <h1>Login</h1>
        

        <form action="adminlogin.php" method="POST">
          <label>Email Address:</label>
          <input
            type="email"
            name="email"
            placeholder="Enter Email"
            autocomplete="off"
            required
          /><br />
          <label>Enter Password:</label>
          <input
            type="password"
            name="pass"
            placeholder="Enter Password"
            autocomplete="off"
          /><br />
          <button type="submit" name="login">Login</button>
        
        </form>
      </div>
    </div>
  </body>
</html>