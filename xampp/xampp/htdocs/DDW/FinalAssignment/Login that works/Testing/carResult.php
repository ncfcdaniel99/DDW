

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
  <a class="navbar-brand" href="testing.html">
    <img src="logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
 <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="testing.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="searchCars.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
	
	    <li class="nav-item">
   <a class="nav-link" href="Admin/adminlocked.php">Admin Login</a>    </li>
  </ul>
</nav>


<?php
function load_makeofcar()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT make FROM cars ORDER BY make ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}
?>

<?php
function load_registration()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT Reg FROM cars ORDER BY Reg ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>

<?php
function load_colour()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT colour FROM cars ORDER BY colour ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>

<?php
function load_town()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT town FROM cars ORDER BY town ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>

<?php
function load_miles()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT miles FROM cars ORDER BY miles ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>
<?php
function load_region()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT region FROM cars ORDER BY region ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>
<?php
function load_exactprice()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT price FROM cars ORDER BY price ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>



<?php
function load_minprice()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT price FROM cars ORDER BY price ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>



<?php
function load_maxprice()
{
  $result='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT price FROM cars ORDER BY price ASC');
  $sqlMake ->execute();
  $result=$sqlMake-> fetchAll();
  return $result;
}
?>


<div class ="outputresults">
<form action="carResults.php" method="post"> 
<?php session_start(); ?>

                <select name="make" id="make" searchable="Search here..">
                    <option value="" selected="true" disabled="disabled">Select Make</option>
                    <?php
	require ("config.php");
	 $result=load_makeofcar();
            foreach ($result as $make): 
	 ?>
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
	 $result=load_registration();
            foreach ($result as $Reg):  ?>
       <?php echo ' <option value="'. $Reg["Reg"].'">'. $Reg["Reg"].'</option>'; ?>
    <?php endforeach; ?>
</select>

</select>

<select class="forms" name ="colour" id="colour" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Colour </Option>
 
 <?php 
	require ("config.php");
	 $result=load_colour();
            foreach ($result as $colour):  ?>
       <?php echo ' <option value="'. $colour["colour"].'">'. $colour["colour"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="town" id="town" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Town </Option>
 
 <?php 
	require ("config.php");
	 $result=load_town();
            foreach ($result as $town):   ?>
       <?php echo ' <option value="'. $town["town"].'">'. $town["town"].'</option>'; ?>
    <?php endforeach; ?>
</select>


<select class="forms" name ="region" id="region" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Region </Option>
 
 <?php 
	require ("config.php");
	 $result=load_region();
            foreach ($result as $region):   ?>
       <?php echo ' <option value="'. $region["region"].'">'. $region["region"].'</option>'; ?>
    <?php endforeach; ?>
</select>



<select class="forms" name ="miles" id="miles" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Miles </Option>
 
 <?php 
require ("config.php");
	 $result=load_miles();
            foreach ($result as $miles):  ?>
       <?php echo ' <option value="'. $miles["miles"].'">'. $miles["miles"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="exactprice" id="exactprice" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Exact Price </Option>
 
 <?php 
require ("config.php");
	 $result=load_exactprice();
            foreach ($result as $exactprice): ?>
       <?php echo ' <option value="'. $exactprice["price"].'">'. $exactprice["price"].'</option>'; ?>
    <?php endforeach; ?>
</select>

<select class="forms" name ="minprice" id="minprice" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Minimum Price </Option>
 
 <?php 
require ("config.php");
	 $result=load_minprice();
            foreach ($result as $minprice): ?>
       <?php echo ' <option value="'. $minprice["price"].'">'. $minprice["price"].'</option>'; ?>
    <?php endforeach; ?>
</select>
<select class="forms" name ="maxprice" id="maxprice" searchable="Search here">
<option value="" selected="true" disabled="disabled"> Select Maximum Price </Option>
<?php 
require ("config.php");
	 $result=load_maxprice();
            foreach ($result as $maxprice): ?>
       <?php echo ' <option value="'. $maxprice["price"].'">'. $maxprice["price"].'</option>'; ?>
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
</div>

</FORM>




 

</div>
</body>
</html>
