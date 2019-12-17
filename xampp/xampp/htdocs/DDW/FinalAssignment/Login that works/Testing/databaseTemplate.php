
<form action="databaseTemplate.php" method="post"> 
<?php session_start(); ?>

                <select name="make" id="make" searchable="Search here..">
                    <option value="" selected="true" disabled="disabled">Select Make</option>
                    <?php
	require ("config.php");
	$sql="select * from cars group by make";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	foreach($results as $make): ?>
       <?php echo ' <option value="'. $make["make"].'">'. $make["make"].'</option>'; ?>

                    <?php endforeach ?>
                </select>

                <select name="model" id="model" searchable="Search here..">
                    <option value="" disabled selected>Select model</option>
	
      </select>


<select class="forms" name ="Reg" id="Reg" searchable="Search here">
<option value="" selected="true" disabled = "disabled"> Select Reg </Option>
  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
	<script>
$(document).ready(function(){
 $('#make').change(function(){

   var make_id = $(this).val();
   $.ajax({
    url:"fetchModel.php",
    method:"POST",
    data:{ makeId:make_id},
    success:function(data){
		
     $('#model').html(data);
    }
   })
  
 });
});
</script>
<?php

$numberOfRecords = 10;

if (!isset($_GET['page']))
{
	$pageNumber = 1;
	$offset = 1;
	
}
else
{
	$pageNumber = $_GET['page'];
	$offset = $pageNumber * $numberOfRecords;
}

$offset = $pageNumber * $numberOfRecords;
$back = $pageNumber - 1;
$next = $pageNumber + 1;


$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [    
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,    
PDO::ATTR_EMULATE_PREPARES   => false,];

try 
{    
	$pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{     
	throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$sqlQuery = "SELECT * FROM cars WHERE make LIKE ? AND model LIKE ? AND reg LIKE ? AND colour LIKE ? AND town LIKE ? AND region LIKE ? LIMIT $offset, $numberOfRecords";
$sql = $pdo->prepare($sqlQuery);
$sql->execute(make,$model,$Reg,$colour,$town,$region);

?>
<link rel="stylesheet" href="main.css">
<div class="outputresults">
    
<?php


while($row = $sql->fetch())
{
		echo $row['make'].",";
		echo $row['model'].",";
		echo $row['Reg'].",";
		echo $row['colour'].",";
		echo $row['miles'].",";		
		echo $row['price'].",";
		echo $row['dealer'].",";
		echo $row['town'].",";
		echo $row['telephone'].",";
		echo $row['description'].",";
		
		
		echo $row['region']."<hr>";
}
echo "<a href='databaseTemplate.php?page=".$back."'>Previous<br></a>";
echo "<a href='databaseTemplate.php?page=".$next."'>next</a>";

?>
<?php




?>
</div>