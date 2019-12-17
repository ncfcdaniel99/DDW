<?php

session_start();

require 'lib/password.php';
 

require 'connect.php';
 

if(isset($_POST['register'])){
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
 
 
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    

    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        die ('That username already exists!');
    }
    
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
 
    $result = $stmt->execute();
    
    if($result){
        die('Thank you for registering with our website.');
    }
    
}
 
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
  crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/custom.css">
</head>
    <body>
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
            <input type="submit" name="register" value="Register"></button>
        </form>
    </body>
</html>