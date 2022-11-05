<?php 
    session_start();

    try{
    if (isset($_SESSION['phone']))
        $phone = $_SESSION['phone'] ;
        

    }catch(Exception $e){
    
    }

    if($phone==null){
    header("location:index.php");
    }  

?>