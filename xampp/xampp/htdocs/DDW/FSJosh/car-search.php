<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Results</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/test.css" >
    <link rel="stylesheet" href="https://unpkg.com/picnic">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
<div id="topbar" class="container-fluid">

        <nav class="topnav fixed-top">
        <div id="logo" style="border:0px; padding:0px; margin-top:-10px; margin-left:-10px;"><a href="navtest.php"><img alt="AutoDealers logo" src="./img/AutoDealersLogo.jpg" ></a></div>
            <a id="contact-nav"class="nav-contact" href="contact.php" style="border-right: 1px solid #71db77;">Contact</a>
            <a id="about-nav"class="nav-about" href="about.php" style="border-right: 1px solid #71db77;">About</a>
            <div id="nav-right" class="navbar-right">
                <a id="login-nav"class="nav-login" href="signin.html" style="border-right: 1px solid #71db77;">Log In</a>
                <a id="register-nav"class="nav-register" href="register_action2.php">Register</a>
            </div>
        </nav>
    </div>
<div class="fluid-container" style="margin-top: 200px; margin-left:130px;">
<div style="width: 100%; display: flex; flex-direction: row; margin: auto; align-items: center;">
<?php
 session_start();
require 'config.php';
if (isset($_POST['make'])) {
  $_SESSION['make'] = $_POST['make'];
}
$make = isset($_SESSION['make']) ? $_SESSION['make'] : '%';
if (isset($_POST['model'])) {
 $_SESSION['model'] = $_POST['model'];
}
$model = isset($_SESSION['model']) ? $_SESSION['model'] : '%';

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$no_of_records_per_page=8;
$offset = ($pageno-1) * $no_of_records_per_page;

$stmt = $pdo->prepare('SELECT * FROM cars WHERE make =? AND model=?');
$stmt->execute([$make, $model]);
$total_rows = $stmt ->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);

$stmt = $pdo->prepare("SELECT * FROM cars WHERE make =? AND model=? LIMIT $offset, $no_of_records_per_page");
$stmt->execute([$make, $model]);

echo '<div class="row justify-content-center" style="margin:auto">';
while($row=$stmt->fetch())
{
  
  echo '<div class="col-3 ">';
  echo '<div class="card bg-success" style="width: 18rem;">
    <img src="' . $row['image'] . '" class="card-img-top" alt="car image">
    <div class="card-body">
      <h5 class="card-title">'.$row['make']. ' ' . $row['model'].'' . $row['carIndex'].'</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><b>Colour: </b>'.$row['colour'].'</li>
      <li class="list-group-item"><b>Milage: </b>'.$row['miles'].'</li>
      <li class="list-group-item"><b>Price: </b><span>&#163;</span>'.$row['price'].'</li>
    </ul>
    <div class="card-body">
      <a href="carview.php?id='.$row['carIndex'].'" class="card-link" style="color:black;">More Info</a>
    </div>
    </div>
      </div>';
}
echo '</div>';



echo "<br><br><br><br><br>";



?>
</div>
</div>
<div class="container-fluid">
      <ul class="pagination justify-content-center" style="margin: 60px">
          <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
          <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
          </li>
          <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
          </li>
          <li class="page-item"><a class="page-link"  href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
    </div>
</body>
</html>