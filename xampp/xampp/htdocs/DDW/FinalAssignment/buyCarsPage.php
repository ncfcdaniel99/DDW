
 <?php
require ("config.php");

$carIndex=$_GET['carIndex'];
$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex');
$sqlQuery->execute(['carIndex' => $carIndex]);

;

while($row = $sqlQuery->fetch())
{
echo "<TC>";
echo "You have chosen: ".$row['make'];
echo ", ".$row['model'];
echo "<br>You can collect the car on:";

echo date('l jS F Y', strtotime('+7 days'));
	echo "<TD align = center ><a href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchse</a>";


	echo"";
	echo "<TC>";

echo "<TR>";
  }

?>