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
  <a class="navbar-brand" href="">
    <img src="logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
	
	    <li class="nav-item">
      <a class="nav-link" href="customeroradmin.php">Admin L</a>
    </li>
	
    <li class="nav-item">
	
	<?php
session_start();
if(isset($_SESSION['make']))
{
unset($_SESSION['make']);       
}
if(isset($_SESSION['model']))
{
unset($_SESSION['model']);       
}
if(isset($_SESSION['colour']))
{
unset($_SESSION['colour']);       
}


function load_make()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT make FROM cars ORDER BY make ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}
function load_colour()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT colour FROM cars ORDER BY colour ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}
function load_region()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT region FROM cars ORDER BY region ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}
function load_price()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT price FROM cars ORDER BY price ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}
if (isset($_COOKIE["admin"])) {
        
  setcookie("admin", "", time()-3600);
}
?>

</nav>

  <div class="container">
    <form action="carResults.php" method="post">

            <select name="make" id="make" searchable="Search here">
            <option value="" selected="true" disabled="disabled">Select Make</option>
            <?php
            $data=load_make();
            foreach ($data as $row): 
            echo '<option value="'.$row["make"].'">'.$row["make"].'</option>';
            ?>
            <?php endforeach ?>
            </select>
        </td>
          <td>
            <select name="model" id="model"  searchable="Search here">
            <option value="" disabled selected>Select model</option>
           
          </select>
          </td>
          <td>
            <select name="colour" id="colour" searchable="Search here">
            <option value="" disabled selected>Select colour</option>
            <?php
            $data=load_colour();
            foreach ($data as $row): 
            echo '<option value="'.$row["colour"].'">'.$row["colour"].'</option>';
            ?>
            <?php endforeach ?>
          </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <select name="region" id="region" searchable="Search here">
            <option value="" disabled selected>Select region</option>
            <?php 
            $data=load_region();
            foreach ($data as $row): 
            echo '<option value="'.$row["region"].'">'.$row["region"].'</option>';
            ?>
            <?php endforeach ?>
            </select>
          </td>
          <td>
            <select name="town" id="town"  searchable="Search here">
            <option value="" disabled selected>Select town</option>
            
          </select>
          </td>
        </tr>
        <tr>
          <td></td>
      
  
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" class="btn btn-danger" value="Search"></td>
          <td></td>
        </tr>
      </table>
    </form>
  </div>
</header>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

