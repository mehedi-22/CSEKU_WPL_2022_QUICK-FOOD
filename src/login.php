
<?php error_reporting (E_ALL ^ E_NOTICE);
include("function.php");

$clogin = new QuickFood();
$cobj = new QuickFood();
if (isset($_POST['signUp'])){
  $mess = $cobj->add($_POST);
}
if (isset($_POST['login'])){
  $message = $clogin->login_info($_POST);
}

session_start();


  try{
    $phone = $_SESSION['phone'];
    if($phone){
      header("location:./index.php");
      
    }

    

  }catch(Exception $e){

  }

 // session_destroy();

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
        

        <form action="login.php" method="POST">
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
          <p>Don't have an account? <a href="sigup.php">Signup</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
