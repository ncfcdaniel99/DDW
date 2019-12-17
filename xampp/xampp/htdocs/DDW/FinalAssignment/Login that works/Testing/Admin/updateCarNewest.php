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
  <a class="navbar-brand" href="../testing.php">
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
    </nav>
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
<div class="outputresults">
<form action="newestcarUpdateRunUpdate.php" method="POST">
	<input type="text"  required class="form-control"  name="carIndex" value="<?php echo $row['carIndex'];?>">
	<input type="text"  required class="form-control" name="make" value="<?php echo $row['make'];?>">
	<input type="text"  required class="form-control" name="model" value="<?php echo $row['model'];?>">
	<input type="text"  required class="form-control" name="Reg" value="<?php echo $row['Reg'];?>">
	<input type="text"  required class="form-control" name="colour" value="<?php echo $row['colour'];?>">
	<input type="text"  required class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="miles" value="<?php echo $row['miles'];?>">
	<input type="text"  required class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="price" value="<?php echo $row['price'];?>">
	<input type="text"  required class="form-control" name="dealer" value="<?php echo $row['dealer'];?>">
	<input type="text"  required class="form-control" name="town" value="<?php echo $row['town'];?>">
	<input type="text"  required class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="telephone" value="<?php echo $row['telephone'];?>">
	<input type="text"  required class="form-control" name="description" value="<?php echo $row['description'];?>">
	<input type="text"  required class="form-control" name="region" value="<?php echo $row['region'];?>">
	<input type="text"  required class="form-control" name="picture" value="<?php echo $row['picture'];?>">
	<input type="text" required class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="purchased" value="<?php echo $row['purchased'];?>">
	<input type="submit" value="Update Car">
</form>

<?php 
}
?>