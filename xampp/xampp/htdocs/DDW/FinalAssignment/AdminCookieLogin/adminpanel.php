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
<div class="outputresults">

<?php
		require ("config.php");

$sqlQuery = $pdo->query('SELECT * FROM cars');

echo "<TABLE BORDER=1>";

while($row = $sqlQuery->fetch())
{
	echo "<TR>";
		echo "<TD>".$row['make']."</TD>";
		echo "<TD>".$row['model']."</TD>";
		echo "<TD>".$row['carIndex']."</TD>";
		echo "<TD><a href='updateCar.php?carIndex=".$row['carIndex']."'>Edit</a>";
		echo "<TD><a href='deleteCar.php?carIndex=".$row['carIndex']."'>Delete Car</a>";

	echo "</TR>";
}

echo "</TABLE>";
?>
</div>