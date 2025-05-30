<?php
require_once 'database.php';
  class User{
    
    public function getAllUsers(){
      $conn = db_connect();
      $statement = $conn->prepare("SELECT * FROM users");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function CreateUser($username, $password){
      $conn = db_connect();
      $statement = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
  }
   
