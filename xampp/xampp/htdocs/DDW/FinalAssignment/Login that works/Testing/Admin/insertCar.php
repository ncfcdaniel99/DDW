  <?php
    session_start() ;
	    if(!isset($_SESSION['auth']))
    {
    header("Location:adminlogin.php") ;
    }
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
	
    <li class="nav-item">
	 <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a class="nav-link" href="adminlogin.php">Admin Login</a> 
    <?php
    }
    else
    {
    ?>
    <a class="nav-link" href="adminlogout.php">Admin Logout</a>
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

<?php


$make=$_POST['make'];
$model=$_POST['model'];
$Reg=$_POST['Reg'];
$colour=$_POST['colour'];
$miles=$_POST['miles'];
$price=$_POST['price'];
$dealer=$_POST['dealer'];
$town=$_POST['town'];
$telephone=$_POST['telephone'];
$description=$_POST['description'];
$region=$_POST['region'];
$picture=$_POST['picture'];

    require 'config.php';
    $sqlQuery = $pdo->query('SELECT carIndex FROM cars ORDER BY carIndex DESC LIMIT 1');
    $row=$sqlQuery->fetch();
    $carIndex = $row['carIndex']+1;
$sql = "INSERT INTO cars (make, model, Reg, colour, miles, price, dealer, town, telephone, description, carIndex, region, picture) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$make, $model, $Reg, $colour, $miles, $price, $dealer, $town, $telephone, $description, $carIndex, $region, $picture]);
echo "<h1  align=center>Car added</h1>";
   header('Refresh: 5; URL=adminlocked.php');
?>