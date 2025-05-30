<?php

  require_once 'config.php';

  function db_connect(){
    try{

      $conn = new               PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';port='.DB_PORT, '.;dbname='.DB_DATABASE, DB_USER, DB_PASS);

      return $conn
    } catch(PDOException $e){}
  }
  

?>