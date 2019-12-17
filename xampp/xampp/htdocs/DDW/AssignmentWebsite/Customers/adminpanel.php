<?php
		require ("config.php");

$sqlQuery = $pdo->query('SELECT * FROM cars');

echo "<TABLE BORDER=1>";

while($row = $sqlQuery->fetch())
{
	echo "<TR>";
		echo "<TD>".$row['make']."</TD>";
		echo "<TD>".$row['model']."</TD>";
		echo "<TD>".$row['carIndex']."</TD>";
		echo "<TD><a href='updateCar.php?carIndex=".$row['carIndex']."'>Edit</a>";
	echo "</TR>";
}

echo "</TABLE>";
?>

?>