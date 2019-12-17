    <form action="databaseTemplate4.php" method="post"> 
<select class="forms" name ="make" id="make" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Make </Option>
 
 <?php 
	require ("config.php");
	$sql="select * from cars group by make";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $make): ?>
       <?php echo ' <option value="'. $make["make"].'">'. $make["make"].'</option>'; ?>
    <?php endforeach; ?>
</select>


<select class="forms" name ="model" id="model">
<option value="" disabled selected > Select Model </Option>



</select>
<button>Submit</button>
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
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</script>
<option value="'. $make["make"].'">'. $make["make"].'</option>';
<script>
$('#make').on("change", function(){
 var index = $('#make')[0].selectedIndex;
 
 $("#model").prop('selectedIndex', index);
})

$('#model').on("change", function(){
 var index = $('#model')[0].selectedIndex;
 
 $("#model").prop('selectedIndex', index);
})
</script>

</html>