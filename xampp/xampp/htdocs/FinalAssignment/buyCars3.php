

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
	error_reporting(E_ALL ^ E_NOTICE);

		require ("config.php");
$make=$_POST['make'];
$model=$_POST['model'];
$make=$_POST['make'];
$reg=$_POST['reg'];
$colour=$_POST['colour'];
$town=$_POST['town'];
$region=$_POST['region'];

/*$stmt=$pdo ->prepare('SELECT * FROM cars WHERE make=? OR model=? OR reg=? OR colour=? OR town=? OR region=?');*/

$stmt=$pdo ->prepare('SELECT * FROM cars WHERE make LIKE ? AND model LIKE ? AND reg LIKE ? AND colour LIKE ? AND town LIKE ? AND region LIKE ?');
$stmt ->execute([$make,$model,$reg,$colour,$town,$region]);
$query=$stmt->fetch();

echo "<TABLE width=1000  BORDER=0  border-spacing: 15px;>";

while ($row = $stmt->fetch())
{   

	echo "<TC>";
	echo "<TD align = center>".$row['make']."</TD>";
   	echo "<TC>";
	echo "<TD align = center>".$row['model']."</TD>";

	echo "<TD align = center><img src='pictures/".$row['picture']."' width=450 height=250 ></TD>";
	echo "<TC>";

	
	echo "<TD align = center ><a href='searchCars.php?carIndex=".$row['carIndex']."'>More Info</a>";

echo "<TR>";
}
echo "</TABLE>";
?>



 
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
