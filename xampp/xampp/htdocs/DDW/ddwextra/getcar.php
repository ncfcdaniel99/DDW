<?php
if(!isset($_GET['carIndex']))
{
	$carIndex="Not data supplied";
}
else
{
	$carIndex=$_GET['carIndex'];
}

require 'db.php';
$sqlQuery=$pdo->prepare('SELECT * from cars WHERE carIndex=:carIndex');
$sqlQuery->execute(['carIndex'=>$carIndex]);
$num_rows = $sqlQuery->rowCount();
if($num_rows==0){
	echo "No records found";
}
else{
	while($row=$sqlQuery->fetch())
{
	echo "<h3>";
	echo $row['make'].",";
	echo $row['model']."<br>";
	echo "</h3>";
}
}




?>