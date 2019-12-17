<?php
$host = 'localhost';
$db   = 'carstore';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$make =$_POST['make'];
$model = $_POST['model'];
$Reg = $_POST['Reg'];
$colour =$_POST['colour']; 
$miles = $_POST['miles'];
$price = $_POST['price'];
$dealer = $_POST['dealer'];
$town = $_POST['town'];
$telephone = $_POST['telephone'];
$description = $_POST['description'];
$region = $_POST['region'];
$picture = $_POST['picture'];

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
$stmt = $pdo->query('SELECT * FROM cars');
$carIndex = $stmt->rowCount()+1;

$sql = "INSERT INTO cars (make, model, Reg, colour, miles, price, dealer, town, telephone, description,carIndex,region, picture) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$make, $model, $Reg, $colour, $miles, $price, $dealer, $town, $telephone, $description,$carIndex, $region, $picture]);
echo "Record added";

?>