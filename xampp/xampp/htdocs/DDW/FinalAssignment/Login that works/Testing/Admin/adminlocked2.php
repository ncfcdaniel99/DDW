<title>Automobile Trader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="../testing.php">
    <img src="../logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../testing.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../about.php">About</a>
    </li>
	

	
    <li class="nav-item">
    </nav>
    <?php
  
    require 'config.php';
    session_start(); // should be at the top of your php

    if (isset($_POST['carIndex'])) {
       $_SESSION['carIndex'] = $_POST['carIndex'];
    }
     $carIndex = isset($_SESSION['carIndex']) ? $_SESSION['carIndex'] : "";
  



    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $numberofrecords = 4;
    $offset = ($pageno-1) * $numberofrecords;
    if($carIndex!=""){
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE carIndex =?"); 
    $stmt->execute([$carIndex]);
    $totalnumberofrows = $stmt ->rowCount();
    $total_pages = ceil($totalnumberofrows / $numberofrecords);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE carIndex ='".$carIndex."'LIMIT $offset, $numberofrecords "); 
$stmt->execute();}
?>


<div class="container">

 <div class="outputresults">

<br>


<?php


echo "<TABLE BORDER=1 width=600>";

while($row = $stmt->fetch())
{

		echo "<TD align=center>".$row['make']."</TD>";
		echo "<TD align=center>".$row['model']."</TD>";
		echo "<TD align=center>".$row['carIndex']."</TD>";
		echo "<TD align=center><a href='updateCarNewest.php?carIndex=".$row['carIndex']."'>Edit</a>";
		echo "<TD align=center><a href='deleteCar.php?carIndex=".$row['carIndex']."'>Delete Car</a>";

  }
echo "</TABLE>";

?>


<br>

        
    </div>
    </div>
    </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>