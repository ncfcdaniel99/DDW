<?php


//Create variables to store data from .html file
if(!isset($_POST['make']))
{
	$make = "%";
}
else
{
	$make=$_POST['make'];
}

if(!isset($_POST['model']))
{
	$model = "%";
}
else
{
	$model=$_POST['model'];
}

if(!isset($_POST['Reg']))
{
	$Reg = "%";
}
else
{
	$Reg=$_POST['Reg'];
}


if(!isset($_POST['colour']))
{
	$colour = "%";
}
else
{
	$colour=$_POST['colour'];
}

if(!isset($_POST['town']))
{
	$town = "%";
}
else
{
	$town=$_POST['town'];
}

if(!isset($_POST['region']))
{
	$region = "%";
}
else
{
	$region=$_POST['region'];
}

$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*$stmt=$pdo ->prepare('SELECT * FROM cars WHERE make=? OR model=? OR reg=? OR colour=? OR town=? OR region=?');*/
$stmt=$pdo ->prepare('SELECT * FROM cars WHERE make LIKE ? AND model LIKE ? AND reg LIKE ? AND colour LIKE ? AND town LIKE ? AND region LIKE ?');
$stmt ->execute([$make,$model,$Reg,$colour,$town,$region]);
$query = $stmt->fetch();

echo "<TABLE BORDER=1>";

while($row = $stmt->fetch())
{
	echo "<TR>";
		echo "<TD>".$row['make']."</TD>";
		echo "<TD>".$row['model']."</TD>";
				echo "<TD>".$row['colour']."</TD>";

		echo "<TD><img src='pictures/".$row['picture']."' width=200 height=100></TD>";

		echo "<TD><a href='getCar.php?carIndex=".$row['carIndex']."'>More Info</a>";
		echo "<TD><a href='deleteCar.php?carIndex=".$row['carIndex']."'>Delete Car</a>";
	echo "</TR>";
}

echo "</TABLE>";


?>