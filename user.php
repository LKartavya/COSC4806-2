<?php

  class User{
    
  require_once 'database.php';

    public function getAllUsers(){
      $conn = db_connect();
      $statement = $conn->prepare("SELECT * FROM users");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
  }
   
