<?php

session_start();
 
/**
 * Include ircmaxell's password_compat library.
 */
require 'lib/password.php';
 
/**
 * Include our MySQL connection.
 */
require 'connect.php';
 
 
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
	    $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
	    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;

    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    	    $address = !empty($_POST['address']) ? trim($_POST['address']) : null;
	    $postcode = !empty($_POST['postcode']) ? trim($_POST['postcode']) : null;
			    $phonenumber = !empty($_POST['phonenumber']) ? trim($_POST['phonenumber']) : null;

		
    //TO ADD: Error checking (email characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    
    //Now, we need to check if the supplied email already exists.
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(email) AS num FROM customers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided email to our prepared statement.
    $stmt->bindValue(':email', $email);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided email already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That email already exists!');
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
//    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO customers (firstname, lastname, email, password, address, postcode, phonenumber) VALUES (:firstname, :lastname, :email, :password, :address, :postcode, :phonenumber)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
	     $stmt->bindValue(':firstname', $firstname);    
	 $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $pass);
     $stmt->bindValue(':address', $address);    
	 $stmt->bindValue(':postcode', $postcode);
	 $stmt->bindValue(':phonenumber', $phonenumber);
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
    
}
 
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $addressErr = $postcodeErr = $phonenumberErr ="";
$firstname = $lastname = $email = $password = $address = $postcode =  $phonenumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }
  
    if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["password"])) {
	$passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["postcode"])) {
    $postcodeErr = "Postcode is required";
  } else {
    $postcode = test_input($_POST["postcode"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form action="customersigningup.php" method="post">
  First Name: <input type="text" name="firstname">
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
    Last Name: <input type="text" name="lastname">
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="text" name="password">
   <span class="error">*<?php echo $passwordErr;?></span>
  <br><br>
 Address: <input type="text" name="address">
   <span class="error">*<?php echo $addressErr;?></span>
  <br><br>
   Postcode: <input type="text" name="postcode">
   <span class="error">*<?php echo $postcodeErr;?></span>
  <br><br>
     Phone Number: <input type="text" name="phonenumber">
   <span class="error">*<?php echo $phonenumberErr;?></span>
  <br><br>
  <input type="submit" name="register" value="Register">  
</form>



<?php
 $sql = "SELECT COUNT(email) AS num FROM customers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided email to our prepared statement.
    $stmt->bindValue(':email', $email);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided email already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That email already exists!');
    }
?>

</body>
</html>
