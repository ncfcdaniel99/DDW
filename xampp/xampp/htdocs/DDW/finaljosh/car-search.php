<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Results</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
<div id="topbar" class="container-fluid" style="margin: 0 0 0 0; padding: 0 0 0 0;">
    <nav class="topnav sticky-top" style="background-color: darkgrey;">
      <a id="nav-home" href="index.php" style="border-right: 1px solid rgba(255,255,255,0.2);">Home</a>
      <a id="nav-search" href="car-search.php" style="border-right: 1px solid rgba(255,255,255,0.2);">Search</a>
      <a id="nav-contact" href="contact.php" style="border-right: 1px solid rgba(255,255,255,0.2);">Contact</a>
      <a id="nav-about" href="about.php">About</a>
      <h1 class="brand">Auto Dealers</h1>
      <a id="nav-contact" href="signin.html" style="border-right: 1px solid rgba(255,255,255,0.2);">Sign In</a>
      <a id="nav-contact" href="register.html" style="border-right: 1px solid rgba(255,255,255,0.2);">Sign Up</a>
    </nav>
  </div>
<div class="container">
<?php
require 'config.php';
$make=$_POST['make'];
$model=$_POST['model'];

$stmt = $pdo->prepare('SELECT * FROM cars WHERE make =? AND model=?');
$stmt->execute([$make, $model]);
	while($row=$stmt->fetch())
	{
		echo $row['make']." ". $row['model']." "." " .$row['colour']." ". $row['town']." " .$row['dealer'].
		" £".$row['price'];
		echo "<br/>";	
	}
?>
</div>
</body>
</html>