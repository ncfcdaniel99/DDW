

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
      <a class="nav-link" href="Login/login.php">Admin Login</a>
    </li>
  </ul>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h1>Car Search</h1>
        <form action="searchCars.php" method="POST">
            Please enter preferred make:
            <br>
            <input type="text" name="make">
            <br>
            Please enter preferred model:
            <br>
            <input type="text" name="model">
            <input type="submit" name="submit" value="Search">
        </form>

    </div>

  </div>
</div>
<div class="outputresults">
<?php
	error_reporting(E_ALL ^ E_NOTICE);

		require ("config.php");
$make=$_POST['make'];
$model=$_POST['model'];
$stmt=$pdo ->prepare('SELECT * FROM cars WHERE make=? AND model=?');
$stmt ->execute([$make,$model]);
$query=$stmt->fetch();

echo "<TABLE BORDER=1>";

while ($row = $stmt->fetch())
{    
	echo "<TC>";
	echo "<TD>".$row['make']."</TD>";
   	echo "<TC>";
	echo "<TD>".$row['model']."</TD>";
	echo "<TC>";
	echo "<TD>".$row['colour']."</TD>";
	echo "<TC>";
		echo "<TD><img src='pictures/".$row['picture']."' width=150 height=100></TD>";
		echo "<TC>";
	echo "<TD>".$row['Reg']."</TD>";
	echo "<TC>";
	
	echo "<TD><a href='searchCars.php?carIndex=".$row['carIndex']."'>More Info</a>";

echo "<TR>";
}
echo "</TABLE>";
?>

<?php
echo "<TABLE BORDER=1>";

while ($row = $stmt->fetch())
{    
	echo "<TC>";
	echo "<TD>".$row['make']."</TD>";
   	echo "<TC>";
	echo "<TD>".$row['model']."</TD>";
	echo "<TC>";
	echo "<TD>".$row['colour']."</TD>";
	echo "<TC>";

	echo "<TD><img src='pictures/".$row['picture']."' width=150 height=100></TD>";
		echo "<TC>";
	echo "<TD>".$row['Reg']."</TD>";
echo "<TR>";
  }
echo "</TABLE>";
?>

 </div>
 
 <?php

$carIndex=$_GET['carIndex'];



$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

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

$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex');
$sqlQuery->execute(['carIndex' => $carIndex]);

echo "<TABLE BORDER=1>";

while($row = $sqlQuery->fetch())
{
	echo "<TC>";
	echo "<TD>".$row['make']."</TD>";
   	echo "<TC>";
	echo "<TD>".$row['model']."</TD>";
	echo "<TC>";
	echo "<TD>".$row['colour']."</TD>";
	echo "<TC>";
	echo "<TD><img src='pictures/".$row['picture']."' width=150 height=100></TD>";
	echo "<TC>";

	echo "<TD>".$row['Reg']."</TD>";

echo "<TR>";
  }
echo "</TABLE>";
?>
</body>
</html>
