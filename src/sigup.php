<?php error_reporting (E_ALL ^ E_NOTICE);
include("function.php");


session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
   
    <link rel="stylesheet" href="../dist/css/customcss/login.css" />
    <title>SignUp</title>
  </head>

  <body>
    <div class="container">
      <div class="container-con">
        <h1>Sign UP</h1>
        

        <form action="login.php" method="POST">
          
          <label>Name:</label>
          <input
            type="tex"
            name="fullName"
            placeholder="Enter Name"
            autocomplete="off"
            required
          /><br />
          <label>Enter Email:</label>
          <input
            type="email"
            name="emailID"
            placeholder="Enter email"
            autocomplete="off"
            required
          /><br /
          <label>Enter Phone:</label>
          <input
            type="number"
            name="phoneNumber"
            placeholder="Enter Phone Number"
            autocomplete="off"
            required
          /><br />
          <label>Enter Password:</label>
          <input
            type="password"
            name="passwords"
            placeholder="Enter Password"
            autocomplete="off"
            required
          /><br />
          
              <button type="submit"  name="signUp">
               Create Account
      
            </button>
                 
         
          <p>Already  have an account? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
