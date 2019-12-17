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
  <a class="navbar-brand" href="testing.php">
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
      <a class="nav-link" href="carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
	
	
    <li class="nav-item">
    </nav>
    <?php
      session_start(); // should be at the top of your php

    require 'config.php';

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

 if (isset($_POST['region'])) {
  $_SESSION['region'] = $_POST['region'];
}
$region = isset($_SESSION['region']) ? $_SESSION['region'] : "";

if (isset($_POST['town'])) {
  $_SESSION['town'] = $_POST['town'];
}
$town = isset($_SESSION['town']) ? $_SESSION['town'] : "";

if (isset($_POST['miles'])) {
  $_SESSION['miles'] = $_POST['miles'];
}
$miles = isset($_SESSION['miles']) ? $_SESSION['miles'] : "";

if (isset($_POST['exactprice'])) {
  $_SESSION['exactprice'] = $_POST['exactprice'];
}
$exactprice = isset($_SESSION['exactprice']) ? $_SESSION['exactprice'] : "";


if (isset($_POST['Reg'])) {
  $_SESSION['Reg'] = $_POST['Reg'];
}
$Reg = isset($_SESSION['Reg']) ? $_SESSION['Reg'] : "";
if (isset($_POST['Reg'])) {
  $_SESSION['Reg'] = $_POST['Reg'];
}
$Reg = isset($_SESSION['Reg']) ? $_SESSION['Reg'] : "";

if (isset($_POST['minprice'])) {
  $_SESSION['minprice'] = $_POST['minprice'];
}
$minprice = isset($_SESSION['minprice']) ? $_SESSION['minprice'] : "";


if (isset($_POST['maxprice'])) {
  $_SESSION['maxprice'] = $_POST['maxprice'];
}
$maxprice = isset($_SESSION['maxprice']) ? $_SESSION['maxprice'] : "";

    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }


    $totalresults = 4;
    $offset = ($pageno-1) * $totalresults;
    if($make!="" AND $model!="" AND $colour!="" AND $Reg!="" AND $region!="" AND $town!="" AND $miles!="" AND $exactprice!=""){
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? AND Reg=? AND colour=? AND region=? AND town=? AND miles=? AND price=? AND purchased=0 ORDER BY carIndex"); 
    $stmt->execute([$make, $model,$colour,$Reg, $region, $town, $miles, $exactprice]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND model='".$model."' AND purchased=0  AND Reg= ='".$Reg. " ' colour ='".$colour. " ' AND region='".$region."' AND town='".$town."' AND miles='".$miles."' AND price='".$exactprice."' LIMIT $offset, $totalresults "); 
$stmt->execute();}

elseif($make!="" AND $model!="" AND $colour!="" AND $region!="" AND $town!="" AND $miles!="" AND $minprice!=""){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? AND colour=? AND region=? AND town=? AND miles=? AND price>=? AND purchased=0 ORDER BY carIndex"); 
  $stmt->execute([$make, $model,$colour, $region, $town, $miles, $minprice]);
  $numberofrows = $stmt ->rowCount();
  $total_pages = ceil($numberofrows / $totalresults);
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND model='".$model."' AND purchased=0  AND  colour ='".$colour. " ' AND region='".$region."' AND town='".$town."' AND miles='".$miles."' AND price>='".$minprice."' LIMIT $offset, $totalresults "); 
$stmt->execute();}

elseif($make!="" AND $model!="" AND $colour!="" AND $region!="" AND $town!="" AND $miles!="" AND $maxprice!=""){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? AND colour=? AND region=? AND town=? AND miles=? AND price<=? AND purchased=0 ORDER BY carIndex"); 
  $stmt->execute([$make, $model,$colour, $region, $town, $miles, $maxprice]);
  $numberofrows = $stmt ->rowCount();
  $total_pages = ceil($numberofrows / $totalresults);
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND model='".$model."' AND purchased=0  AND  colour ='".$colour. " ' AND region='".$region."' AND town='".$town."' AND miles='".$miles."' AND price<='".$maxprice."' LIMIT $offset, $totalresults "); 
$stmt->execute();} 

else if(($make!="" AND $model!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? AND purchased=0 ORDER BY carIndex");
    $stmt->execute([$make, $model]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND purchased=0  AND model='".$model."'  LIMIT $offset, $totalresults "); 
$stmt->execute();
}
else if(($make!="" AND $model!="" AND $colour!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=?  AND colour = ? AND purchased=0 ORDER BY carIndex");
    $stmt->execute([$make, $model, $Reg]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE make ='".$make."' AND purchased=0  AND model='".$model."' AND colour='".$colour."'  LIMIT $offset, $totalresults "); 
$stmt->execute();

}else if(($Reg!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE Reg =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$Reg]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE Reg ='".$Reg."'AND purchased=0  LIMIT $offset, $totalresults "); 
}else if(($colour!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE colour =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$colour]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE colour ='".$colour."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();
}else if(($region!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE region =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$region]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE region ='".$region."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();




}else if(($make=="" AND $model=="" AND $region!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE region =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$region]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE region ='".$region."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();

}else if(($town!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE town =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$town]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE town ='".$town."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();
}else if(( $miles!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE miles =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$miles]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE miles ='".$miles."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();
}else if(($exactprice!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE price =? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$exactprice]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE price ='".$exactprice."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();
}else if(($minprice!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE price >=? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$minprice]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE price >='".$minprice."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();
}else if(($maxprice!="")){
  $stmt = $pdo->prepare("SELECT * FROM cars WHERE price <=? AND purchased=0  ORDER BY  carIndex");
    $stmt->execute([$maxprice]);
    $numberofrows = $stmt ->rowCount();
    $total_pages = ceil($numberofrows / $totalresults);
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE price <='".$maxprice."'AND purchased=0  LIMIT $offset, $totalresults "); 
$stmt->execute();
}
?>

<br>

<div class="container">

 <div class="outputresults">
<h5><?php echo $numberofrows.' cars(s) have been found' ?></h5>


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
		echo $row['region'].",";
    echo "<div class=resultbutton onclick=location.href='searchCars.php?carIndex=".$row['carIndex']."'>More Information</div>";

  }

?>




      <ul class="pagination">
      <li class="page-item"> <a class="page-link" href="?pageno=1">First Page</a></li>
          <li class="page-item" <?php if($pageno <= 1){ echo 'disabled'; } ?>class="page-item disabled">
              <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous Page</a>
          </li>
          <li <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next Page</a>
          </li>
          <li class="page-item"> <a class="page-link"  href="?pageno=<?php echo $total_pages; ?>">Last Page</a></li>
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