

<?php
require 'config.php';
 
$username=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['savecookie']))
	{
		$savecookie=$_POST['savecookie'];
	}
else 
{
	$savecookie =false;
}
		if($savecookie ==true)
		{
			setcookie("username", $_POST['username'], time()+3600);
			setcookie("password", $_POST['password'], time()+3600);
			 $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
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
		else
		{
			echo"Tick to login";
		}


?>
