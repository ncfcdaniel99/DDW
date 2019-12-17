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
    </nav>
    <?php
  
    require 'config.php';
    session_start(); // should be at the top of your php

    if (isset($_POST['make'])) {
       $_SESSION['make'] = $_POST['make'];
    }
     $make = isset($_SESSION['make']) ? $_SESSION['make'] : "";
    if (isset($_POST['model'])) {
      $_SESSION['model'] = $_POST['model'];
   }
   $model = isset($_SESSION['model']) ? $_SESSION['model'] : "";
   
   if (isset($_POST['colour'])) {
    $_SESSION['colour'] = $_POST['colour'];
 }
 $colour = isset($_SESSION['colour']) ? $_SESSION['colour'] : "";
 if (isset($_POST['min_price'])) {
  $_SESSION['min_price'] = $_POST['min_price'];
}


    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $numberofrecords = 4;
    $offset = ($pageno-1) * $numberofrecords;
    if($make!="" AND $model!="" AND $colour!=""){
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? AND colour=? AND purchased=0 ORDER BY carIndex"); 
    $stmt->execute([$make, $model,$colour]);
    $totalnumberofrows = $stmt ->rowCount();
    $total_pages = ceil($totalnumberofrows / $numberofrecords);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND model='".$model."' AND purchased=0  AND  colour ='".$colour. " '  LIMIT $offset, $numberofrecords "); 
$stmt->execute();}
else if(($make!="" AND $model!="" AND $colour=="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? AND purchased=0 ORDER BY carIndex");
    $stmt->execute([$make, $model]);
    $totalnumberofrows = $stmt ->rowCount();
    $total_pages = ceil($totalnumberofrows / $numberofrecords);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND purchased=0  AND model='".$model."'  LIMIT $offset, $numberofrecords "); 
$stmt->execute();
}else if(($make=="" AND $model=="" AND $colour!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE colour =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$colour]);
    $totalnumberofrows = $stmt ->rowCount();
    $total_pages = ceil($totalnumberofrows / $numberofrecords);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE colour ='".$colour."'AND purchased=0  LIMIT $offset, $numberofrecords "); 
$stmt->execute();
}


?>
   
<br>

<div class="container">

 <div class="outputresults">
<h5><?php echo $totalnumberofrows.' cars(s) have been found' ?></h5>


<?php



while($row = $stmt->fetch())
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
		echo $row['region'].",";
    echo "<div class=resultbutton onclick=location.href='searchCars.php?carIndex=".$row['carIndex']."'>More Information</div>";

  }

?>




      <ul class="pagination">
          <li ><a class="page-link" href="?pageno=1">First Page</a></li>
          <li <?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous Page</a>
          </li>
          <li  <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next Page</a>
          </li>
          <li><a class="page-link"  href="?pageno=<?php echo $total_pages; ?>">Last Page</a></li>
      </ul>
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