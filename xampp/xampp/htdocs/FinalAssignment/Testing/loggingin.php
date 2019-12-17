    <?php
    session_start() ;
	
		require 'config.php';

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
    
    $sql = "SELECT * FROM customers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if($user === false){

        echo('email is Incorrect email / password combination!');
    } else{
  
        
       // $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($passwordAttempt == $user['password']){
                
$_SESSION['success'] =  "Successfully Logged In";
$_SESSION['auth'] = 1 ;
    header("Location:buyCars.php") ;

    }
    else
    {
    $_SESSION['failure'] =  "Incorrect";
	    header("Location:login.php") ;

    }
            

	
	}
		}
		

?>
