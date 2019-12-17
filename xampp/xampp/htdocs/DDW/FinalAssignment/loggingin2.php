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
                
    $_SESSION['success'] =  "Correct";
header("Location:buyCarsPage.php") ;

require ("config.php");



$carIndex=$_GET['carIndex'];
$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex');
$sqlQuery->execute(['carIndex' => $carIndex]);

;

while($row = $sqlQuery->fetch())
{
echo "<TC>";
echo "You have chosen: ".$row['make'];
echo ", ".$row['model'];
echo "<br>You can collect the car on:";

echo date('l jS F Y', strtotime('+7 days'));
	echo "<TD align = center ><a href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchse</a>";


	echo"";
	echo "<TC>";

echo "<TR>";
  }

    }
    else
    {
    $_SESSION['failure'] =  "Incorrect";
		    header("Location:buyCars.php") ;

    }
            

	
	}
		}
		

?>
