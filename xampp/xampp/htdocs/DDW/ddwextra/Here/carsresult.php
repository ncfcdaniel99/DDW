<?php
require('db.php');
$region=$_POST['region'];
$make=$_POST['makeList'];
$model=$_POST['modelList'];
$colour=$_POST['colourList'];

$stmt = $pdo->prepare('SELECT * FROM cars WHERE make =? AND model=? AND colour=? AND region=?');
$stmt->execute([$make, $model,$colour,$region]);


			while($row=$stmt->fetch())
					{
						echo $row['make']." ". $row['model']." "." " .$row['colour']." ". $row['town']." " .$row['dealer'].
						" £".$row['price'];
						echo "<br/>";
						
					}

?>