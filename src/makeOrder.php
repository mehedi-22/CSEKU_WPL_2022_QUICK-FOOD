<?php
 

 require_once './Connection.php';
 include_once './Cart.php';
 session_start();

try{
  if (isset($_SESSION['phone']))
      $phone = $_SESSION['phone'] ;
      

}catch(Exception $e){
   
}

 class QueryBuilderForOrder{
      protected $pdo;
      public function __construct($pdo)
      {
      $this->pdo = $pdo;
      }
      
      function fetchAll($table){
           $statements = $this->pdo->prepare("select * from {$table}");
           $statements->execute();
           return  $statements->fetchAll();    
           }
      
      function fetchAllWithClass($table,$className ){
           $statements = $this->pdo->prepare("select * from {$table}");
           $statements->execute();
           return  $statements->fetchAll(PDO::FETCH_CLASS,$className);    
      }
      function fetchBycondition($table){
          $email = $_SESSION['email'];
          $statements = $this->pdo->prepare("select * from $table where userId = ? ");
          $statements->execute([$email]);
          return  $statements->fetchAll();    
          }
      
 }

 $query =  new QueryBuilderForOrder(Connection::make());
 $foodsIncart = $query->fetchBycondition('cart');
 

?>