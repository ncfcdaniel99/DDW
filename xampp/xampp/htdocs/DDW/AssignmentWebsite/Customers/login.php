

<!DOCTYPE html>
<html>
<head>	  <link rel="stylesheet" href="main.css">
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
      <a class="nav-link" href="testing.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="searchCars.php">Search Cars</a>
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
 
//login.php
 
/**
 * Start the session.
 */
session_start();
 
/**
 * Include ircmaxell's password_compat library.
 */
require 'lib/password.php';
 
/**
 * Include our MySQL connection.
 */
require 'connect.php';
 
 
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('Location: adminpanel.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
			die( 'input type=submit name=login value=Login');

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
        <h1>Login</h1>
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
    </body>
</html>