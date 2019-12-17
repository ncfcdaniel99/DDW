<?php
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

$sqlQuery = ("SELECT * FROM cars ORDER BY Reg LIMIT 100,10");
$sql = $pdo->prepare($sqlQuery);
$sql->execute();

while($result = $sql->fetch())
{
	echo $result['make'].", ";
	echo $result['model'].", ";
	echo $result['Reg'].", ";
	echo $result['colour'].", ";
	echo $result['miles'].", ";
	echo $result['price'].", ";
	echo $result['dealer'].", ";
	echo $result['town'].", ";
	echo $result['region'].", ";
	echo $result['telephone'].", ";
	echo $result['description']."<hr>";
}
?>