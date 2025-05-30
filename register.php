<?php 

  require_once 'database.php';
  require_once 'config.php';

  function isStrongPsw($password){
    
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
  
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']?? '');
    $password = $_POST['password']?? '';

    if (empty($username) || empty($password)){
      die('Username and password are required');
    }

    if (!isStrongPsw($password)){
      die('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
    }

    $conn = db_connect();
    
    $stmt = $conn->prepare("select * from users where username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()){
      die('Username already exists');
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("insert into users (username, password) values (?, ?)");
    
    if ($stmt->execute([$username, $password_hash])){
      echo "User registered successfully!! <a href='login.php'> Login here </a>"; 
    } else{
      echo "Error registering user. Please try again.";
    }
  }
      
?>

<form method="post">
 
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type = "submit">Register</button>

</form>