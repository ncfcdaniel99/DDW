    <form action="databaseTemplate4.php" method="post"> 
<select>
    <?php 
	require ("config.php");
	$sql="select * from cars group by make";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $make): ?>
       <?php echo ' <option value="'. $make["carIndex"].'">'. $make["make"].'</option>'; ?>
    <?php endforeach; ?>
</select>
<?php 
	require ("config.php");
$sqlQuery = $pdo->query('SELECT * FROM cars');

echo "<TABLE BORDER=1>";

while($row = $sqlQuery->fetch())
{
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



