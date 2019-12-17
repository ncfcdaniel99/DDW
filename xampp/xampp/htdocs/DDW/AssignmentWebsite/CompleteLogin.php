<?php
 
session_start();
 

require 'config.php';
 
 
if(isset($_POST['login']))
{
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
		$login=$_POST['login'];

if($login ==true)
		{
			setcookie("username", $_POST['username'], time()+3600);
			setcookie("password", $_POST['password'], time()+3600);
			echo"You are logging in";
		}
		else
		{
			echo" Need to tick box";
		}

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

<html>
<head>
<title>User Login Form </title>
</head>
<body>
<form action="CompleteLogin.php" method="post">
Username: <input type="text" name="username" size=12 ><br>
Password: <input type="text" name="password" size=12><br>

  <input type="checkbox" name="login"> I want to login<br>
  <input type="submit" value="Submit">


</form>
</body>
</html>

	