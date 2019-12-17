<?php
    session_start() ;

    ?><head>
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
  <a class="navbar-brand" href="">
    <img src="logo.png" alt="logo" style="width:80px;">
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
	

  </ul>
</nav>
<?php

if(!isset($_POST['username']))
{
	$username="First Name not entered";
}
else
{
	$username=$_POST['username'];
}
if(!isset($_POST['password']))
{
	$password="Last Name not entered";
}
else
{
	$password=$_POST['password'];
}


require 'config.php';
$sqlQuery = $pdo->query('SELECT id FROM admins  ORDER BY id  DESC LIMIT 1');
$row=$sqlQuery->fetch();
$id = $row['id']+1;
$sql = "INSERT INTO admins (username, password, id) VALUES (?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$username, $password, $id]);
echo "<h1  align=center>Admin Added</h1>";
header('Refresh: 5; URL=adminlogin.php');
?>



