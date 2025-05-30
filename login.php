<?php

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $username = trim($_POST['username']?? '');
  $password = $_POST['password']?? '';

  if (empty($username) || empty($password)){
    die('Username and password are required');
  }

  $conn = db_connect();

  $stmt = $conn->prepare("select * from users where username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password'])){
    echo "Login successful!!";
  } else{
    echo "Invalid username or password";
  }
  
}
?>

<form method = "post">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type = "submit">Login</button>
</form>