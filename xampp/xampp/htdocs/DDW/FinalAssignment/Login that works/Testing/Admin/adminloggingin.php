    <?php
    session_start() ;
	
		require 'config.php';

	$username=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['savecookie']))
	{
		$savecookie=$_POST['savecookie'];
	}
else 
{
    $savecookie =false;?>

    <title>Automobile Trader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="">
    <img src="logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
	
	    <li class="nav-item">
      <a class="nav-link" href="customeroradmin.php">Admin L</a>
    </li>
	
    <li class="nav-item">
    </nav><?php
    echo"You must tick in order to login...";
}
		if($savecookie ==true)
		{
			setcookie("username", $_POST['username'], time()+3600);
			setcookie("password", $_POST['password'], time()+3600);
			 $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT * FROM admins WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if($user === false){

        echo('username is Incorrect username / password combination!');
    } else{
  
        
       // $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($passwordAttempt == $user['password']){
                
$_SESSION['success'] =  "Successfully Logged In";
$_SESSION['auth'] = 1 ;
header('location:adminlocked.php');

    }
    else
    {
        echo('Incorrect email / password combination!');
        

    }
            

	
	}
		}
		

?>
