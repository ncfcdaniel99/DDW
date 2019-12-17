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

        echo('Incorrect username / password combination!');
    } else{
  
        
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($validPassword){
            
            
            header('Location: adminpanel.php');
            exit;
            
        } else{
            echo('Incorrect username / password combination!');
			

        }
    }
    
}
 
?>