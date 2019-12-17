<?php
    session_start() ;

    ?><head>
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
      <a class="nav-link" href="../testing.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../about.php">About</a>
    </li>
	

  </ul>
</nav>
<?php


if(!isset($_POST['firstname']))
{
	$firstname="First Name not entered";
}
else
{
	$firstname=$_POST['firstname'];
}
if(!isset($_POST['lastname']))
{
	$lastname="Last Name not entered";
}
else
{
	$lastname=$_POST['lastname'];
}

if(!isset($_POST['email']))
{
	$email="No email supplied";
}
else
{
	$email=$_POST['email'];
}
if(!isset($_POST['password']))
{
	$password="No password entered";
}
else
{
	$password=$_POST['password'];
}


if(!isset($_POST['address']))
{
	$address="No address entered";
}
else
{
	$address=$_POST['address'];
}

if(!isset($_POST['postcode']))
{
	$postcode="No postcode entered";
}
else
{
	$postcode=$_POST['postcode'];
}

if(!isset($_POST['phonenumber']))
{
	$phonenumber="No password entered";
}
else
{
	$phonenumber=$_POST['phonenumber'];
}

 


require 'config.php';
$sqlQuery = $pdo->query('SELECT id FROM customers  ORDER BY id  DESC LIMIT 1');
$row=$sqlQuery->fetch();
$id = $row['id']+1;
$sql = "INSERT INTO customers (firstname, lastname, email, password, address, postcode, phonenumber, id) VALUES (?,?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$firstname, $lastname, $email, $password, $address, $postcode, $phonenumber, $id]);
echo "<h1  align=center>Customer Addess Added</h1>";
header('Refresh: 5; URL=customerlogin.php');
?>



