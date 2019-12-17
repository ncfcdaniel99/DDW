    <?php
    session_start() ;
    if(!isset($_SESSION['auth']))
    {
    header("Location:login.php") ;
    }
    ?>
    <title>PHP Script to View Page Only After Login | PlanetGhost.com</title>
    <center>
    <h3>PHP Script to View Page Only After Login(Demo)</h3>
    <?php
    if(isset($_SESSION['success']))
    {
    ?>
    <div class="success">
    <?php echo $_SESSION['success'] ; ?>
    </div>
    <?php
    unset($_SESSION['success']) ;
    }
    if(isset($_SESSION['failure']))
    {
    ?>
    <div class="failure">
    <?php echo $_SESSION['failure'] ;?>
    </div>
    <?php
    unset($_SESSION['failure']) ;
    }
    ?>
    <a href="index.php">HOME</a> | <b><a href="locked.php">Locked Page</a></b> |  
    <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a href="login.php">Login</a> 
    <?php
    }
    else
    {
    ?>
     <a href="logout.php">Logout</a>
     <?php
     }
     ?>


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

<br>
