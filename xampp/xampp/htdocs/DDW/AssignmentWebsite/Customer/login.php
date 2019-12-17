

<!DOCTYPE html>
<html>
<head>	  <link rel="stylesheet" href="../main.css">
	<link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
 <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../testing.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../searchCars.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
	
	    <li class="nav-item">
      <a class="nav-link" href="Login/login.php">Admin Login</a>
    </li>
  </ul>
</nav>


<?php
 
session_start();
 

require 'config.php';
 
 
if(isset($_POST['login'])){
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT * FROM customers WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if($user === false){

        echo('Username is Incorrect username / password combination!');
    } else{
  
        
       // $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($passwordAttempt == $user['password']){
            
            
            header('Location: ../searchCars.php');
            exit;
            
        } else{
			echo "db - ".$user['password'];
			echo "<br>";
			echo "pw - ".$passwordAttempt;
            echo('Password is Incorrect username / password combination!');
			

        }
    }
    
}
 
?>
<!DOCTYPE html>
<html>
    <head>

	<link rel="stylesheet" type="text/css" href="../style.css">
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1></h1>
        <form action="login.php" method="post">
		<div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
			</div>
		<div class="input-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
						</div>
		<div class="input-group">

            <input type="submit" name="login" value="Login">
        </div>
		</form>
		<div class="btn-group" style="width:100%">
		<h2>Don't have an account?  </h2></br>

  <button style="width:20%" onclick="window.location.href = 'register.php';">Admin Sign up</button>
</div>
    </body>
</html>
</html>