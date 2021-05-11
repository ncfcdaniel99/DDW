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
      <a class="nav-link" href="../login.php">Admin Login</a>
    </li>
  </ul>
</nav>
<?php
$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$carIndex = $_GET['carIndex'];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [    
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,    
PDO::ATTR_EMULATE_PREPARES   => false,];

try 
{    
	$pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{     
	throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


if (isset($_POST['id'])) {
  $_SESSION['id'] = $_POST['id'];
}
$id = isset($_SESSION['id']) ? $_SESSION['id'] : "";

//$sqlQuery = $pdo->query('SELECT * FROM cars');
$sqlQuery = $pdo->prepare("UPDATE Cars SET purchased=1 WHERE carIndex =  :carIndex");
$sqlQuery->execute(['carIndex' => $carIndex]);

    if($id!=""){
$sqlQuery = $pdo->prepare("UPDATE Cars SET purchasedby= WHERE id =  :id");

echo"Car, ".$carIndex." has been purchased";











?>