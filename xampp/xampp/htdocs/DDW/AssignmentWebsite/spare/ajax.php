<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
		require ("config.php");

$sqlQuery = $pdo->query('SELECT * FROM cars');
$sqlQuery ->execute();

echo "<TABLE BORDER=1>";

while($row = $sqlQuery->fetch()) {
	echo "<TR>";
		echo "<TD>".$row['make']."</TD>";
		echo "<TD>".$row['model']."</TD>";
		echo "<TD><img src='pictures/".$row['picture']."' width=200 height=100></TD>";

		echo "<TD><a href='getCar.php?carIndex=".$row['carIndex']."'>More Info</a>";
		echo "<TD><a href='deleteCar.php?carIndex=".$row['carIndex']."'>Delete Car</a>";
	echo "</TR>";
}

echo "</TABLE>";




?>
</body>
</html>