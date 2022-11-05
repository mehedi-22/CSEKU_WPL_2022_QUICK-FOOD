<?php
     include_once './Connection.php';
     include_once './Cart.php';

     class QueryBuilder{
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
          function delete($table , int $id)
          {
               $statements = $this->pdo->prepare(
                    "delete from table {$table} where productId = {$id}"
               );
               $statements->execute();
               return  $statements->fetchAll();  
               
          }

     }
    

    
     // $results = $query->fetchAll('cart','Cart');
     // var_dump($results[0]->name())

?>