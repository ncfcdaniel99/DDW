
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

session_start();
// define variables and set to empty values
	$firstname = $lastname = $email = $password = $address = $postcode =  $phonenumber = "";

  if (empty($_POST["firstname"])) {
    $firstname = "Name is required";
  } else {
    $firstname = ($_POST["firstname"]);
  }
  
    if (empty($_POST["lastname"])) {
    $lastname = "Name is required";
  } else {
    $lastname = ($_POST["lastname"]);
  }
  
  if (empty($_POST["email"])) {
    $emai = "Email is required";
  } else {
    $email = ($_POST["email"]);
  }
    
  if (empty($_POST["password"])) {
	$password = "Password is required";
  } else {
    $password = ($_POST["password"]);
  }

  if (empty($_POST["address"])) {
    $address = "Address is required";
  } else {
    $address = ($_POST["address"]);
  }

  if (empty($_POST["postcode"])) {
    $postcode = "Postcode is required";
  } else {
    $postcode = ($_POST["postcode"]);
  }

  if (empty($_POST["phonenumber"])) {
    $phonenumber = "Phone number is required";
  } else {
    $phonenumber = ($_POST["phonenumber"]);
  }
  
  
if(isset($_POST['register']))
{
    require 'config.php';
    $stmt=$pdo ->prepare('SELECT * FROM customers WHERE email=?');
    $stmt ->execute([$email]);
    $num_rows = $stmt->rowCount();
    if($num_rows==1)
    {
echo "Already exists";    }
    else
        {

			 $sql = "INSERT INTO customers (firstname, lastname, email, password, address, postcode, phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?)";
             $stmt=$pdo ->prepare($sql);
             $stmt->execute($email);
             
        }
    }





?>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form action="customersigningup.php" method="post">
  First Name: <input type="text" name="firstname">
  <span class="error">* <?php echo $firstname;?></span>
  <br><br>
    Last Name: <input type="text" name="lastname">
  <span class="error">* <?php echo $lastname;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $email;?></span>
  <br><br>
  Password: <input type="text" name="password">
   <span class="error">*<?php echo $password;?></span>
  <br><br>
 Address: <input type="text" name="address">
   <span class="error">*<?php echo $address;?></span>
  <br><br>
   Postcode: <input type="text" name="postcode">
   <span class="error">*<?php echo $postcode;?></span>
  <br><br>
     Phone Number: <input type="text" name="phonenumber">
   <span class="error">*<?php echo $phonenumber;?></span>
  <br><br>
  <input type="submit" name="register" value="Register">  
</form>




</body>
</html>
