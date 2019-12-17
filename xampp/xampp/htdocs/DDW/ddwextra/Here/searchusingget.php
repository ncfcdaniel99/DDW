<?php
if(!isset($_GET['make']))
{
	$make="Not data supplied";
}
else
{
	$make=$_GET['make'];
}
if(!isset($_GET['model']))
{
	$model="Not data supplied";
}
else
{
	$model=$_GET['model'];
}
require 'db.php';
$sqlQuery=$pdo->prepare('SELECT * from cars WHERE make=:make AND model=:model');
$sqlQuery->execute(['make'=>$make,'model'=>$model]);
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