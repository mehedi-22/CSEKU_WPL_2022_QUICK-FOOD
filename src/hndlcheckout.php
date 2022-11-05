<?php 
require_once '../Database/Connection.php';
    
class QryBuilder{
    protected $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    function pdoExecutes($query){
        try{
            $statements = $this->pdo->prepare($query);
            $statements->execute();
            return $statements;

        }catch(PDOException $e){
            echo $e;
        }
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
        $query = "delete from  {$table} where productId = {$id}";
        $statements = $this->pdoExecutes($query);
        echo $statements->execute();
    }

    function insertByID($table , $id){
         $query =  "insert into $table values($id)";
         $statements = $this->pdoExecutes($query);
   
    }
    
    function updateByID($queryStr,$ara){
        
        try{
                $stmt = $this->pdo->prepare($queryStr);
                $stmt->execute($ara);

            }catch(PDOException $e){
               die($e);
            }
   }
 
}
   $query = new QryBuilder(Connection::make());

   if(isset($_GET['id']) && isset($_GET['quantity'])){
    
        $id = $_GET['id'];
        $quantity= $_GET['quantity'];
        $queryStr = "UPDATE cart SET quantity = ? WHERE productId=?";
        $query->updateByID($queryStr,[$quantity,$id]);
        echo "ok";
   }
?>











