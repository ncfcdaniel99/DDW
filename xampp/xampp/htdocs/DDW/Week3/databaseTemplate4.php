<?php

//Create variables to store data from .html file
$make=$_POST['make'];
$model=$_POST['model'];

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

$stmt = $pdo->prepare('SELECT * FROM cars WHERE make = ? AND model=?');
$stmt->execute([$make, $model]);
$query = $stmt->fetch();


while ($row = $stmt->fetch())
{

    echo $row['make'] . "\n";
    echo $row[‘model’] . “\n”;

}


?>