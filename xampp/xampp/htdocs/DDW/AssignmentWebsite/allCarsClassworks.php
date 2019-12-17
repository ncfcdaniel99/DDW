    <form action="databaseTemplate4.php" method="post"> 
<select class="forms" name ="make" id="make" searchable="Search here" onchange="updatesearch">
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

<select class="forms" name ="model" id="model" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Model </Option>
 
 <?php 
	require ("config.php");
	$sql="select * from cars group by model";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $model): ?>
       <?php echo ' <option value="'. $model["model"].'">'. $model["model"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="Reg" id="Reg" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Reg </Option>
 
 <?php 
	require ("config.php");
	$sql="select * from cars group by Reg";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $Reg): ?>
       <?php echo ' <option value="'. $Reg["Reg"].'">'. $Reg["Reg"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="colour" id="colour" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Colour </Option>
 
 <?php 
	require ("config.php");
	$sql="select * from cars group by colour";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $colour): ?>
       <?php echo ' <option value="'. $colour["colour"].'">'. $colour["colour"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="town" id="town" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Town </Option>
 
 <?php 
	require ("config.php");
	$sql="select * from cars group by town";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $town): ?>
       <?php echo ' <option value="'. $town["town"].'">'. $town["town"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="region" id="region" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Region </Option>
 
 <?php 
	require ("config.php");
	$sql="select * from cars group by region";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $region): ?>
       <?php echo ' <option value="'. $make["region"].'">'. $region["region"].'</option>'; ?>
    <?php endforeach; ?>
</select>




<button>Submit</button>


</html>