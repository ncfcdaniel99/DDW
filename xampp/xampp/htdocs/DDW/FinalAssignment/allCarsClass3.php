

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Automobile Trader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
 <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="testing.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="searchCars.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
	
	    <li class="nav-item">
   <a class="nav-link" href="login.php">Admin Login</a>    </li>
  </ul>
</nav>
  <form action="allCarsClass3.php" method="post"> 


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
<option value="" selected="true" disabled ="disabled"> Select Reg </Option>
 <?php require ("config.php");
	$sql="select * from cars group by Reg";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $Reg): ?>
       <?php echo ' <option value="'. $make["Reg"].'">'. $Reg["Reg"].'</option>'; ?>
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


</FORM>


<div class="outputresults">
<?php
	require ("config.php");

if(!isset($_POST['make']))
{
	$make = "%";
}
else
{
	$make=$_POST['make'];
}

if(!isset($_POST['model']))
{
	$model = "%";
}
else
{
	$model=$_POST['model'];
}

if(!isset($_POST['Reg']))
{
	$Reg = "%";
}
else
{
	$Reg=$_POST['Reg'];
}


if(!isset($_POST['colour']))
{
	$colour = "%";
}
else
{
	$colour=$_POST['colour'];
}

if(!isset($_POST['town']))
{
	$town = "%";
}
else
{
	$town=$_POST['town'];
}

if(!isset($_POST['region']))
{
	$region = "%";
}
else
{
	$region=$_POST['region'];
}
$sqlQuery = "SELECT * FROM cars  make LIKE ? AND model LIKE ? AND reg LIKE ? AND colour LIKE ? AND town LIKE ? AND region LIKE ? LIMIT $offset, $numberOfRecords";
$sql = $pdo->prepare($sqlQuery);
$sql->execute();




echo "<TABLE BORDER=1>";

while($row = $stmt->fetch())
{
	echo "<TR>";
		echo "<TD>".$row['make']."</TD>";
		echo "<TD>".$row['model']."</TD>";
				echo "<TD>".$row['colour']."</TD>";

		echo "<TD><img src='pictures/".$row['picture']."' width=200 height=100></TD>";

		echo "<TD><a href='searchCars.php?carIndex=".$row['carIndex']."'>More Info</a>";

	echo "</TR>";
}

echo "</TABLE>";
?>



 
 <?php
require ("config.php");

$carIndex=$_GET['carIndex'];
$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex ');
$sqlQuery->execute(['carIndex' => $carIndex]);

echo "<TABLE width=1000 BORDER=1>";

while($row = $sqlQuery->fetch())
{
echo "<TC>";
	echo "<TD align = center>".$row['make']."</TD>";
   	echo "<TC>";
	echo "<TD align = center>".$row['model']."</TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['colour']."</TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['region']."</TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['town']."</TD>";
	echo "<TC>";
	echo "<TD align = center><img src='pictures/".$row['picture']."' width=150 height=100></TD>";
	echo "<TC>";
	echo "<TD align = center>".$row['Reg']."</TD>" ;
	echo "<TC>";
	echo "<TD align = center ><a href='allCarsClass3.php?carIndex=".$row['carIndex']."'>Buy</a>";

	echo"";
	echo "<TC>";

echo "<TR>";
  }
echo "</TABLE>";
?>
<br>

</div>
</body>
</html>
