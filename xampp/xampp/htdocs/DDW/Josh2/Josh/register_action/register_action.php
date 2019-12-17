<?php
session_start();

 
require 'connect.php';
require 'config.php';



if(isset($_POST['register'])){
    

    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	    $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
	    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;

     $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

 
    $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";

	$stmt = $pdo->prepare($sql);
    

    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        die ('That username already exists!');
    }
    
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    $sql = "INSERT INTO users (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email', $email);

    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);

 
    $result = $stmt->execute();
    
    if($result){
        die('Thank you for registering with our website.');
    }
    
}
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="register_action.php" method="post">
            <label for="email">Username</label>
            <input type="text" id="email" name="email"><br>
			
				<label for="firstname">FirstName</label>
            <input type="text" id="firstname" name="firstname"><br>
			<label for="lastname">LastName</label>
            <input type="text" id="lastname" name="lastname"><br>
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
            <input type="submit" name="register" value="Register"></button>
        </form>
    </body>
</html>