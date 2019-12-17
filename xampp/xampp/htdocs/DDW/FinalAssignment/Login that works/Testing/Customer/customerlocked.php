      <?php
    session_start() ;
        $_SESSION['redirectme'] = $_SERVER['REQUEST_URI'];
	    if(!isset($_SESSION['auth']))
    {
    header("Location:customerlogin.php") ;
    }
    ?>
<head>
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
    <img src="../logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../about.php">About</a>
    </li>
	

    <li class="nav-item">
	 <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a class="nav-link" href="customerlogin.php">Customer Login</a> 
    <?php
    }
    else
    {
    ?>
    <a class="nav-link" href="customerlogout.php">Customer Logout</a>
    <?php
     }
    ?>
    <?php
    if(isset($_SESSION['success']))
    {
    ?>
    <div class="success">

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
</li>
  </ul>
</nav>



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
echo "You have chosen to purchase the ".$row['make'];
echo ", ".$row['model'];
echo "<br> From ".$row['dealer'];
echo " in ".$row['town'];

 
    

echo "<br>You can collect the car on: ";

echo date('l jS F Y', strtotime('+7 days'));
echo"<br>";
echo"You will need to bring the following information when you collect the car: <br>";
echo"<ul> <li>Driving Licence <br> </li>";
echo" <li>Insurance Documents <br> </li>";
echo" <li> Proof of Purchase <br> </li></ul>";

echo"Use the following websites to get your car insurance:";
echo"<br>";
echo" <a href=https://www.lv.com/insurance> <ul> <img class = insuranceimages src=images/lvlogo.jpg  alt=LV> <br> </a></li>";
echo" <a href=https://www.theaa.com/car-insurance/>  <img class = insuranceimages src=images/aalogo.jpg  alt=LV> <br> </a></li>";
echo" <a href=https://www.admiral.com/> <img class = insuranceimages src=images/admirallogo.jpg  alt=LV> <br> </a></li>";
?>
<?php


echo"<br>";
?>
<?php
echo "<div class=purchasebutton onclick=location.href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchase</div>";


  }

  echo"<br>"
?>
<?php

require_once 'init.php';
?>

<?php if($user->purchased): ?>
<?php


echo "<div class=purchasebutton style=background-color:red onclick=location.href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchase</div>";?>
<p> You have already paid for your car, press confirm to continue</p>
<?php else: ?>
<p>  <div class="purchasebutton" onclick=location.href="purchased.php">Pay for the car</div></p>
<?php endif; ?>





</div>
</body>
</html>
