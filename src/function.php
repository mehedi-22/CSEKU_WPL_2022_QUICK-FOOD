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
          return "successfully updated";
          
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
      
        if(is_array($row)){
          //$customer = mysqli_fetch_assoc($customerdata);
           session_start();
           
          $_SESSION['name'] =  $row['fullName'];
          $_SESSION['email'] =  $row['emailID'];
          $_SESSION['phone'] =  $row['phoneNumber'];
           header("location:../index.php");
        

        }
        else{
          echo "invalid ";
         
        }
       
      }

}
        
    }
  

?>