      <?php
    session_start() ;
	    if(!isset($_SESSION['auth']))
    {
    header("Location:adminlogin.php") ;
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



<div class="outputresults">



<?php
$carIndex = $_GET['carIndex'];

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

$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = ?');
$sqlQuery->execute([$carIndex]);

while($row = $sqlQuery->fetch())
{
?>



	

<form action="carUpdateRunUpdate.php" method="POST">
	Car Index: <input type="text" class="form-control" name="carIndex" size="width:150px" value="<?php echo $row['carIndex'];?>">
	Make: <input type="text"  class="form-control"  name="make" value="<?php echo $row['make'];?>">
	Model: <input type="text"   class="form-control"  name="model" value="<?php echo $row['model'];?>"><br>
	Reg: <input type="text"  class="form-control" name="Reg" value="<?php echo $row['Reg'];?>">
	Colour: <input type="text"  class="form-control" name="colour" value="<?php echo $row['colour'];?>">
	Miles: <input type="text"  class="form-control" name="miles" value="<?php echo $row['miles'];?>"><br>
	Price: <input type="text"  class="form-control" name="price" value="<?php echo $row['price'];?>">
	Dealer: <input type="text"  class="form-control" name="dealer" value="<?php echo $row['dealer'];?>">
	Town: <input type="text"  class="form-control" name="town" value="<?php echo $row['town'];?>"><br>
	Telephone: <input type="text"  class="form-control"  name="telephone" value="<?php echo $row['telephone'];?>">
	Description: <input type="text"  class="form-control" name="description" value="<?php echo $row['description'];?>">
	Region: <input type="text"  class="form-control" name="region" value="<?php echo $row['region'];?>"><br>
	Picture: <input type="text"  class="form-control" name="picture" value="<?php echo $row['picture'];?>">
	Purchased: <input type="text"  class="form-control" name="purchased" value="<?php echo $row['purchased'];?>">
	<input type="submit" value="Update Car">
</form>

<?php 
}
?>
