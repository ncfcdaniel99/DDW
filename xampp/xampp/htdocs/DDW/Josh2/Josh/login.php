<?php
 
session_start();
 

require 'config.php';
 
 
if(isset($_POST['login'])){
    
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if($user === false){

        echo('Incorrect email / password combination!');
    } else{
  
        
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($validPassword){
            
            
            header('Location: adminpanel.php');
            exit;
            
        } else{
            echo('Incorrect email / password combination!');
			

        }
    }
    
}
 
?>
<!DOCTYPE html>
<html>
    <head>

	<link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1></h1>
        <form action="login.php" method="post">
		<div class="input-group">
            <label for="email">email</label>
            <input type="text" id="email" name="email"><br>
			</div>
		<div class="input-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
						</div>
		<div class="input-group">

            <input type="submit" name="login" value="Login">
        </div>
		</form>
    </body>
</html>