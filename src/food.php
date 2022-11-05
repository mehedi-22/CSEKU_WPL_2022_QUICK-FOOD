<?php error_reporting(0); ?>

<?php

 require_once "../Database/Connection.php";
 require_once "./testQuery.php";

 $query =  new TestQuery(Connection::make());
 $foods = $query->fetchAll('foods');
 require '../src/manue.php';

?>