

<?php
require 'connect.php';
 
$email=$_POST['email'];
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
			setcookie("email", $_POST['email'], time()+3600);
			setcookie("password", $_POST['password'], time()+3600);
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
		else
		{
			echo"Tick to login";
		}


?>
