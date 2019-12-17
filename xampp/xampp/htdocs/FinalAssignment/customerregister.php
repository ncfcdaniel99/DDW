
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  


<?php


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$password=$_POST['password'];
$address=$_POST['address'];
$postcode=$_POST['postcode'];
$phonenumber=$_POST['phonenumber'];


    require 'config.php';

$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $addressErr = $postcodeErr = $phonenumberErr = "";
$firstname = $lastname = $email = $password = $address = $postcode = $phonenumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Name is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
    $passwordErr = "Name is required";
  } else {
    $password = test_input($_POST["password"]);
  }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
    $passwordErr = "Name is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["address"])) {
    $addressErr = "Name is required";
  } else {
    $address = test_input($_POST["address"]);
  }
  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["postcode"])) {
    $postcodeErr = "Name is required";
  } else {
    $postcode = test_input($_POST["[postcode"]);
  }
  
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["phonenumber"])) {
    $phonenumberErr = "Name is required";
  } else {
    $phonenumber = test_input($_POST["[phonenumber"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO customers (firstname, lastname, email, password, address, postcode, phonenumber) VALUES (?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$firstname, $lastname, $email, $password, $address, $postcode, $phonenumber]);
echo "Record added";
?>

<form action="customerregister.php" method="post"> 

First Name: <input type="text" name="firstname" size=12 ><br>
Last Name: <input type="text" name="lastname" size=12><br>
Email: <input type="text" name="email" size=12><br>
Password: <input type="text" name="password" size=12><br>
Address: <input type="text" name="address" size=12><br>
Postcode: <input type="text" name="postcode" size=12><br>
Phone Number: <input type="text" name="phonenumber" size=12><br>




<input type="submit" name="carsearch" size =12>
 
</form>

</body>
</html>