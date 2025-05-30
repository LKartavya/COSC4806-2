<? php

  require_once 'database.php';

  Class User{

    public function getAllUsers(){
      $conn = db_connect();
      $statement = $db->prepare("SELECT * FROM users:");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
  }
   
?>