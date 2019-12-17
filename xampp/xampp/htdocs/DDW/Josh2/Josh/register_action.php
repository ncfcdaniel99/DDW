<?php
session_start();

 
require 'connect.php';
require 'config.php';



if(isset($_POST['register'])){
    

    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	    $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
	    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;

     $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

 
    $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";

	$stmt = $pdo->prepare($sql);
    

    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        die ('That username already exists!');
    }
    
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    $sql = "INSERT INTO users (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email', $email);

    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);

 
    $result = $stmt->execute();
    
    if($result){
        die('Thank you for registering with our website.');
    }
    
}
 
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
  crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/custom.css">
</head>


    <body>
  <div class="container-fluid bg">

    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">

          <div class="form-group">
            <h1>Auto Dealers Register</h1>
        <form action="register_action.php" method="post">
		  <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email"
              placeholder="Enter an email">
  </div>          <div class="form-group">

              <label for="firstname">First Name:</label>
            <input type="name" name="firstname" class="form-control" id="firstname" placeholder="Enter your forename">
</div>
              <label for="lastname">Last Name:</label>
            <input type="name" name="lastname" id="lastname" class="form-control" placeholder="Enter you surname">
         
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password"  id="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" name="register" class="btn btn-success btn-block">Submit</button>
        </form>
		
		
          
		  </div>
		      <div class="col-md-4 col-sm-4 col-xs-12"></div>

    </div>
	  </div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/main.js"></script>
    </body>
</html>