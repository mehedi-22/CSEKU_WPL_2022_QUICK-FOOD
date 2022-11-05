<?php 
require_once '../Database/Connection.php';
    
class TestQuery{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    function pdoExecutes($query,$ara=[]){
        try{
            $statements = $this->pdo->prepare($query);
            $statements->execute($ara);
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

    function customQuery($query){
        $statements = $this->pdo->prepare($query);
        $statements->execute();
        return  $statements->fetchAll();    
   }
    
    function fetchTransaction($table){
            $statements = $this->pdo->prepare("select * from {$table} ORDER BY date DESC");
            $statements->execute();
            return  $statements->fetchAll();    
    }
    function fetchConfirmTransaction($id){
        $query = " SELECT * FROM (SELECT * FROM transactions WHERE
        transactions.TRANSACTIONID  in (SELECT confirmtransactions.transaction FROM confirmtransactions)) as temp WHERE temp.Email = '$id' ORDER BY temp.date DESC ";
        $statements = $this->pdo->prepare($query);
        $statements->execute();
        return  $statements->fetchAll();    
    }

    function admin_fetchConfirmTransaction(){
        $query = " SELECT * FROM (SELECT * FROM transactions WHERE
        transactions.TRANSACTIONID  in (SELECT confirmtransactions.transaction FROM confirmtransactions)) as temp ORDER BY temp.date DESC ";
        $statements = $this->pdo->prepare($query);
        $statements->execute();
        return  $statements->fetchAll();    
    }


    function fetchPendingConfirmTransaction($id){
        $query = " SELECT * FROM (SELECT * FROM transactions WHERE transactions.TRANSACTIONID not in (SELECT confirmtransactions.transaction FROM confirmtransactions)) as temp WHERE temp.Email = '$id' ";
        $statements = $this->pdo->prepare($query);
        $statements->execute();
        return  $statements->fetchAll();
    }

    
    function admin_fetchPendingConfirmTransaction(){
        $query = " SELECT * FROM (SELECT * FROM transactions WHERE transactions.TRANSACTIONID not in (SELECT confirmtransactions.transaction FROM confirmtransactions)) as temp  ";
        $statements = $this->pdo->prepare($query);
        $statements->execute();
        return  $statements->fetchAll();
    }
       

        //  ORDER BY column_name(s) ASC
    
    function fetchAllWithClass($table,$className ){
         $statements = $this->pdo->prepare("select * from {$table}");
         $statements->execute();
         return  $statements->fetchAll(PDO::FETCH_CLASS,$className);    
    }
    function deleteRowById($table , $id)
    {     
        $query = "delete from  {$table} where productId = {$id}";
        $statements = $this->pdoExecutes($query);
        $statements->execute();
    }

    function insert($table , $field){
         $query =  "insert into $table values(?)";
         $statements = $this->pdoExecutes($query,[$field]);
   
    }
    function insertNew($table , array $fields){
        $rpt = str_repeat("?,",count($fields)-1);
        $query =  "insert into $table values($rpt ?)";
        $statements = $this->pdoExecutes($query,$fields);
  
   }
//updated
   function deleteTable($tableName){
        $query  = "delete from $tableName";
        $statements = $this->pdo->prepare($query);
        $statements->execute();
   }


}

   
?>