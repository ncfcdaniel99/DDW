

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
require ("config.php");

$carIndex=$_GET['carIndex'];
$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex');
$sqlQuery->execute(['carIndex' => $carIndex]);

echo "<TABLE width=500 BORDER=1>";

while($row = $sqlQuery->fetch())
{
echo "<TC>";
	echo "<TD align = center>".$row['make']."</TD>";
   	echo "<TC>";
	echo "<TD align = center>".$row['model']."</TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['colour']."</TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['region']."</TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['town']."</TD>";
	echo "<TC>";
	echo "<TD align = center><img src='pictures/".$row['picture']."' width=150 height=100></TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['Reg']."</TD>" ;
	echo "<TC>";
	echo "<TD align = center ><a href='buyCars.php?carIndex=".$row['carIndex']."'>Buy</a>";

	echo"";
	echo "<TC>";

echo "<TR>";
  }
echo "</TABLE>";
?>


<br>

</div>
</body>
</html>
