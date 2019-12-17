<?php

$make=$_POST['make'];
$model=$_POST['model'];

$host = 'localhost';
$db   = 'carstore';
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

$sqlQuery=$pdo -> prepare('SELECT * FROM cars WHERE make=? AND model=? ');
$sqlQuery ->execute([$make,$model]);

$count=$sqlQuery ->rowCount();
if($count==0)
	echo "No records";
else
	echo "Number of records: ".$count;
echo "<br>";
echo "<br>";

while($row=$sqlQuery->fetch())
{
	echo $row['make']." , ".$row['model']."<BR>";


}


?>