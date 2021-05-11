<?php
$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$carIndex = $_GET['carIndex'];

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

//$sqlQuery = $pdo->query('SELECT * FROM cars');
$sqlQuery = $pdo->prepare("DELETE FROM Cars  WHERE carIndex =  :carIndex");
$sqlQuery->execute(['carIndex' => $carIndex]);

echo"Car, ".$carIndex." has been deleted";












?>