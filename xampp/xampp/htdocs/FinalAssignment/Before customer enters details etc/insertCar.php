<?php


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

    require 'config.php';
    $sqlQuery = $pdo->query('SELECT carIndex FROM cars ORDER BY carIndex DESC LIMIT 1');
    $row=$sqlQuery->fetch();
    $carIndex = $row['carIndex']+1;
$sql = "INSERT INTO cars (make, model, reg, colour, miles, price, dealer, town, telephone, description, carIndex, region, picture) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$make, $model, $reg, $colour, $miles, $price, $dealer, $town, $telephone, $description, $carIndex, $region, $picture]);
echo "Record added";
?>