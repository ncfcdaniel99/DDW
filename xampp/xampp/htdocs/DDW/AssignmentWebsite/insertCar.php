<?php
$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$make=$_POST['make'];
$model=$_POST['model'];
$reg=$_POST['reg'];
$colour=$_POST['colour'];
$miles=$_POST['miles'];
$price=$_POST['price'];
$dealer=$_POST['dealer'];
$town=$_POST['town'];
$telephone=$_POST['telephone'];
$description=$_POST['description'];
$region=$_POST['region'];
$picture=$_POST['picture'];

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

$sql = "INSERT INTO cars (make, model, reg, colour, miles, price, dealer, town, telephone, description,region, picture) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$make, $model, $reg, $colour, $miles, $price, $dealer, $town, $telephone, $description, $region, $picture]);
echo "Record added";
?>