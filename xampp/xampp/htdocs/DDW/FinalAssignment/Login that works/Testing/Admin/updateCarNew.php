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

<form action="newcarUpdateRunUpdate.php" method="POST">
	<input type="text" required name="carIndex" value="<?php echo $row['carIndex'];?>">
	<input type="text" required name="make" value="<?php echo $row['make'];?>">
	<input type="text" required name="model" value="<?php echo $row['model'];?>">
	<input type="text" required name="Reg" value="<?php echo $row['Reg'];?>">
	<input type="text" required name="colour" value="<?php echo $row['colour'];?>">
	<input type="text" required name="miles" value="<?php echo $row['miles'];?>">
	<input type="text" required name="price" value="<?php echo $row['price'];?>">
	<input type="text" required name="dealer" value="<?php echo $row['dealer'];?>">
	<input type="text" required name="town" value="<?php echo $row['town'];?>">
	<input type="text" required name="telephone" value="<?php echo $row['telephone'];?>">
	<input type="text" required name="description" value="<?php echo $row['description'];?>">
	<input type="text" required name="region" value="<?php echo $row['region'];?>">
	<input type="text" required name="picture" value="<?php echo $row['picture'];?>">
	<input type="submit" value="Update Car">
</form>

<?php 
}
?>