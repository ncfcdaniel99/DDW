

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
    <div class="heading">
      <h1>Car Search</h1>
	  </div>
	  <br>
	    <div class="row">

	  <div class="col-sm-3">
        <form action="searchCars.php" method="POST">
            Please enter preferred make:
            <br>
            <input type="text" name="make">
            <br>
			</div>
			 <div class="col-sm-3">
            Please enter preferred model:
            <br>
		
			<input type="text" name="model"> 	 <br>
			</div>

			<div class="col-sm-3">
			Please enter preferred reg:		
			<input type="text" name="reg"><br>
			</div>
			<div class="col-sm-3">
			Please enter preferred colour:		
			<input type="text" name="colour"><br>
			</div>
			<div class="col-sm-3">
			Please enter preferred town:		
			<input type="text" name="town"><br>
			</div>
			<div class="col-sm-3">
			Please enter preferred region:		
			<input type="text" name="region"><br>
			</div>
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
$make=$_POST['make'];
$reg=$_POST['reg'];
$colour=$_POST['colour'];
$town=$_POST['town'];
$region=$_POST['region'];
$stmt=$pdo ->prepare('SELECT * FROM cars WHERE make=?  OR model=?  OR reg=? OR colour=? OR town=? OR region=?');
$stmt ->execute([$make,$model,$reg,$colour,$town,$region]);
$query=$stmt->fetch();

echo "<TABLE width=1000 BORDER=1>";

while ($row = $stmt->fetch())
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
	echo "<TD align = center>".$row['Reg']."</TD>";
	echo "<TC>";
	
	echo "<TD align = center><a href='searchCars.php?carIndex=".$row['carIndex']."'>More Info</a>";

echo "<TR>";
}
echo "</TABLE>";
?>



 
 <?php
require ("config.php");

$carIndex=$_GET['carIndex'];
$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex');
$sqlQuery->execute(['carIndex' => $carIndex]);

echo "<TABLE width=1000 BORDER=1>";

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
