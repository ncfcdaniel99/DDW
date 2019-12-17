

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Automobile Trader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
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
   <a class="nav-link" href="login.php">Admin Login</a>    </li>
  </ul>
</nav>

<div class="container">
    <div class="heading">

     


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="testing.html">Home</a></li>
    <li class="breadcrumb-item"><a href="http://localhost/DDW/AssignmentWebsite/allCarsClass3.php">Search</a></li>
  </ol>
</nav>


    </div>

  </div>
</div>

<div class="outputresults">
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
<!DOCTYPE html>

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
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $addressErr = $postcodeErr = "";
$firstname = $lastname = $email = $postcode = $address = $password = "";

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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
  <span class="error"><?php echo $passwordErr;?></span>
  <br><br>
 Address: <input type="text" name="address">
  <span class="error"><?php echo $addressErr;?></span>
  <br><br>
   Postcode: <input type="text" name="postcode">
  <span class="error"><?php echo $postcodeErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $postcode;
?>

</body>
</html>


 
 <?php
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

?>
<br>

</div>
</body>
</html>
