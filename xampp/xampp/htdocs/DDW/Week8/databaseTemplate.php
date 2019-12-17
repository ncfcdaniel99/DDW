<?php

$numberOfRecords = 10;

if (!isset($_GET['page']))
{
	$pageNumber = 1;
	$offset = 1;
	
}
else
{
	$pageNumber = $_GET['page'];
	$offset = $pageNumber * $numberOfRecords;
}

$offset = $pageNumber * $numberOfRecords;
$back = $pageNumber - 1;
$next = $pageNumber + 1;


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


$sqlQuery = "SELECT * FROM cars ORDER BY Reg LIMIT $offset, $numberOfRecords";
$sql = $pdo->prepare($sqlQuery);
$sql->execute();

?>
<link rel="stylesheet" href="main.css">
<div class="outputresults">
    
<?php


while($row = $sql->fetch())
{
		echo $row['make'].",";
		echo $row['model'].",";
		echo $row['Reg'].",";
		echo $row['colour'].",";
		echo $row['miles'].",";		
		echo $row['price'].",";
		echo $row['dealer'].",";
		echo $row['town'].",";
		echo $row['telephone'].",";
		echo $row['description'].",";
		
		
		echo $row['region']."<hr>";
}
echo "<a href='databaseTemplate.php?page=".$back."'>Previous<br></a>";
echo "<a href='databaseTemplate.php?page=".$next."'>next</a>";

?>
<?php




?>
</div>