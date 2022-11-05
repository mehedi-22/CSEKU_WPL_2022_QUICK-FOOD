<?php 
    require_once '../Connection.php';
    class QueryBuilderForRemove{
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
        function deleteRowById($table , $id)
        {     
            echo "delete from table {$table} where productId = {$id}";
             $statements = $this->pdo->prepare(
                  "delete from  {$table} where productId = {$id}"
             );
              
              echo $statements->execute();
              
             
        }
     
   }
   $query = new QueryBuilderForRemove(Connection::make());

   if(isset($_GET['id'])){
        echo $_GET['id'];
        $query->deleteRowById('cart', $_GET['id']);
   }
   
?>