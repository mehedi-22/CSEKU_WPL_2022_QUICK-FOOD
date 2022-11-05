<?php
  Class QuickFood {
    private $conn;

    public function __construct(){
         $dbhost ='localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'quick_food';
 
      
         $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
         
         if (!$this->conn){
          die("could not connect");
         }
           

    }
    

    public function add($data){
            $name = $data['fullName'];
            $email =$data['emailID'];
            $phone = $data['phoneNumber'];
            $pass = $data['passwords'];
            $query = "INSERT INTO customers (fullName, emailID, phoneNumber, passwords) VALUES ('$name', '$email', $phone, '$pass')";

            if(mysqli_query($this->conn, $query)){
              return "success";
             // session_start();
             // $_SESSION['phone']=0178231;
             //$_SESSION['phone'] = 1028;
              
            }

    }

    // food add
    public function food_info($data){
      $id = $data['foodID'];
      $fname =$data['foodName'];
      $details = $data['details'];
      $availability	 = $data['availability'];
      $price = $data['price'];
      $quantity= $data['quantity'];
      $image = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];


      $query = "INSERT INTO foods (foodID, foodName, details, availability, price, quantity, image) VALUES ($id, '$fname', '$details', '$availability', $price, '$quantity', '$image' )";

      if(mysqli_query($this->conn, $query)){
       
        move_uploaded_file($tmp_name,'./upload/'.$image);
        return "success";
      
        
      }

}
  
public function food_display(){
  $query = "SELECT * FROM foods";
  if(mysqli_query($this->conn, $query)){
    $foodsdata = mysqli_query($this->conn, $query);
    return  $foodsdata;
  }
}


public function searchFood($value){
  $query = "SELECT * FROM foods WHERE CONCAT(foodName,foodID,details,availability) LIKE '%$value%'";
  if(mysqli_query($this->conn, $query)){
    $foodsdata = mysqli_query($this->conn, $query);
    return  $foodsdata;
  }
}

public function food_display_id($id){
  $query = "SELECT * FROM foods WHERE foodID =$id";
  if(mysqli_query($this->conn, $query)){
    $foodsdata = mysqli_query($this->conn, $query);
    $food = mysqli_fetch_assoc( $foodsdata);
    return $food;
  }
}
// start

public function food_info_update($data){
  $id = $data['ufoodID'];
  $fname =$data['ufoodName'];
  $details = $data['udetails'];
  $availability	 = $data['uavailability'];
  $price = $data['uprice'];
  $quantity= $data['uquantity'];
  $image = $_FILES['uimage']['name'];
  $tmp_name = $_FILES['uimage']['tmp_name'];

  $query = "UPDATE foods SET foodName='$fname', details='$details', availability='$availability', price=$price, quantity='$quantity', image='$image' WHERE foodID=$id";


  if(mysqli_query($this->conn, $query)){
   
    move_uploaded_file($tmp_name,'./upload/'.$image);
    return "successfully updated";
    
  }

}




//end


  public function food_delete($id){
        $catch_data = "SELECT * FROM foods WHERE foodID=$id";
        $connect_info= mysqli_query($this->conn, $catch_data);
        $fetch_info = mysqli_fetch_assoc( $connect_info);
        $delete_img = $fetch_info['image'];
        $query = "DELETE FROM foods WHERE foodID=$id";

        if(mysqli_query($this->conn, $query)){
          unlink('./upload/'.$delete_img);
         // move_uploaded_file($tmp_name,'./upload/'.$image);
         // return "successfully updated";
        // echo "<script> alert(' Successfully deleted ')</script>";
        
        }

  }

  // Transaction
  public function OrderDetails(){
    $query = "SELECT * FROM transactions";
    if(mysqli_query($this->conn, $query)){
      $data = mysqli_query($this->conn, $query);
      return  $data;
    }
  }

  public function searchTransaction($value){
    $query = "SELECT * FROM transactions WHERE CONCAT(TRANSACTIONID,Phone,Product,Email) LIKE '%$value%'";
    if(mysqli_query($this->conn, $query)){
      $data = mysqli_query($this->conn, $query);
      return  $data;
    }
  }


  public function OrderDelete($id){
    $catch_data = "SELECT * FROM transactions WHERE TRANSACTIONID='$id' ";
    $connect_info= mysqli_query($this->conn, $catch_data);
    $fetch_info = mysqli_fetch_assoc( $connect_info);
   // $delete_img = $fetch_info['image'];
    $query = "DELETE FROM transactions WHERE TRANSACTIONID='$id' ";

    if(mysqli_query($this->conn, $query)){
     // unlink('./upload/'.$delete_img);
     // move_uploaded_file($tmp_name,'./upload/'.$image);
      return "successfully updated";
    // echo "<script> alert(' Successfully deleted ')</script>";
    
    }
}
//admin review 
public function review_display(){
  $query = "SELECT * FROM reviews order by date ";
  if(mysqli_query($this->conn, $query)){
    $foodsdata = mysqli_query($this->conn, $query);
    return  $foodsdata;
  }
}

public function searchReview($value){
  $query = "SELECT * FROM reviews WHERE CONCAT(orderId,phone,email,review) LIKE '%$value%'";
  if(mysqli_query($this->conn, $query)){
    $data = mysqli_query($this->conn, $query);
    return  $data;
  }
}
public function review_delete($id){
  
  $query = "DELETE FROM reviews WHERE orderId='$id' ";
  if(mysqli_query($this->conn, $query)){
    //$reviewdata = mysqli_query($this->conn, $query);
    return  "Sucessfully Ddeleted";
  }
}

// conformatrion
function confirmation_messaage($id){
  $time = date ('Y-m-d H:i:s');
  $query = "INSERT INTO confirmtransactions VALUES ('$id','$time')";

            if(mysqli_query($this->conn, $query)){
              return "success";
             // session_start();
             // $_SESSION['phone']=0178231;
             //$_SESSION['phone'] = 1028;
              
            }

}


// conformation

// function confirmation_message($id){
//   $time = date ('Y-m-d H:i:s');
//   $query = "INSERT INTO confirmtransactions VALUES ('$id','$time')";

//             if(mysqli_query($this->conn, $query)){
//               return "success";
//             }
// }

public function deliveryMove($id){
 
 $query = "INSERT INTO delivery SELECT * FROM transactions WHERE TRANSACTIONID ='$id'";
 
  if(mysqli_query($this->conn, $query)){
  return "Moved successfully";
  }

}

public function DeliveryDetails(){
  $query = "SELECT * FROM delivery";
  if(mysqli_query($this->conn, $query)){
    $data = mysqli_query($this->conn, $query);
    return  $data;
  }
}

public function searcheDelivery($value){
  $query = "SELECT * FROM delivery WHERE CONCAT(TRANSACTIONID,Phone,Product,Email) LIKE '%$value%'";
  if(mysqli_query($this->conn, $query)){
    $data = mysqli_query($this->conn, $query);
    return  $data;
  }
}

//enmd
function confirmation_messaage2($datas){
 
  $query = "SELECT * FROM completed WHERE TransactionID = '$datas' ";
            if(mysqli_query($this->conn, $query)){
              $data = mysqli_query($this->conn, $query);
              $row = mysqli_fetch_array($data);
              if(is_array($row)){
                //header("location:add_Food.php");
                return"Completed";
               
              }
              else{
                //header("location:add_Food.php");
                return "Pending Transaction";
              }
              //return "success";
             // session_start();
             // $_SESSION['phone']=0178231;
             //$_SESSION['phone'] = 1028;
            // $data = mysqli_query($this->conn, $query);
           // $row = mysqli_fetch_array($data);
              
            }

          }


    //end of food adds
    public function login_info($login_data){
      $email = $login_data['email'];
      $password =$login_data['pass'];
      $query = "SELECT * FROM customers WHERE emailID = '$email' && passwords = '$password' ";
      if(mysqli_query($this->conn, $query)){
        $customerdata = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($customerdata);
        var_dump($row);
        if(is_array($row)){

          //$customer = mysqli_fetch_assoc($customerdata);
           session_start();
           
          $_SESSION['fullName'] =  $row['fullName'];
          $_SESSION['emailID'] =  $row['emailID'];
           $_SESSION['phone'] =  $row['phoneNumber'];
           header("location:../index.php");


        }
        else{
          echo "invalid ";
         
        }
       
      }
   }

   public function adminlogin_info($login_data){
    $email = $login_data['email'];
    $password =$login_data['pass'];
    $query = "SELECT * FROM logins WHERE emailID = '$email' && pass = '$password' ";
    if(mysqli_query($this->conn, $query)){
      $admindata = mysqli_query($this->conn, $query);
      $row = mysqli_fetch_array($admindata);
    
      if(is_array($row)){
       
        
         session_start();
         
        $_SESSION['pass'] =  $row['pass'];
        $_SESSION['emailID'] =  $row['emailID'];
        header("location:../admin.php");
        
      

      }
      else{
       // echo "invalid ";
       
      }
     
    }

}
        
    }
  

?>

