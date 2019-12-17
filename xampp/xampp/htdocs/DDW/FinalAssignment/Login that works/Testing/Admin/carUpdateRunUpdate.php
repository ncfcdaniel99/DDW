 <?php
    session_start() ;
	    if(!isset($_SESSION['auth']))
    {
    header("Location:adminlogin.php") ;
    }
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
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
	
    <li class="nav-item">
	 <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a class="nav-link" href="adminlogin.php">Admin Login</a> 
    <?php
    }
    else
    {
    ?>
    <a class="nav-link" href="adminlogout.php">Admin Logout</a>
    <?php
     }
    ?>
    <?php
    if(isset($_SESSION['success']))
    {
    ?>
    <div class="success">

    </div>
    <?php
    unset($_SESSION['success']) ;
    }
    if(isset($_SESSION['failure']))
    {
    ?>
    <div class="failure">
    <?php echo $_SESSION['failure'] ;?>
    </div>
    <?php
    unset($_SESSION['failure']) ;
    }
    ?>
</li>
  </ul>
</nav><?php
require 'config.php';

$sql = "UPDATE cars SET 
make = :make, 
            model = :model, 
            Reg = :reg,  
            colour = :colour, 
            miles = :miles,  
            price = :price,  
            dealer = :dealer,
			town = :town, 
            telephone = :telephone,  
            description = :description,  
            region = :region,  
            picture = :picture,
            purchased = :purchased
            WHERE carIndex = :carIndex";
$sqlQuery = $pdo->prepare($sql);                                  
$sqlQuery->bindParam(':make', $_POST['make'], PDO::PARAM_STR);       
$sqlQuery->bindParam(':model', $_POST['$model'], PDO::PARAM_STR);    
$sqlQuery->bindParam(':reg', $_POST['reg'], PDO::PARAM_STR);
// use PARAM_STR although a number  
$sqlQuery->bindParam(':colour', $_POST['colour'], PDO::PARAM_STR); 
$sqlQuery->bindParam(':miles', $_POST['miles'], PDO::PARAM_STR);   
$sqlQuery->bindParam(':price', $_POST['price'], PDO::PARAM_INT);   
$sqlQuery->bindParam(':dealer', $_POST['dealer'], PDO::PARAM_STR); 
$sqlQuery->bindParam(':town', $_POST['town'], PDO::PARAM_STR); 
$sqlQuery->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR); 
$sqlQuery->bindParam(':description', $_POST['description'], PDO::PARAM_STR);   
$sqlQuery->bindParam(':region', $_POST['region'], PDO::PARAM_INT);   
$sqlQuery->bindParam(':picture', $_POST['picture'], PDO::PARAM_STR); 
$sqlQuery->bindParam(':purchased', $_POST['purchased'], PDO::PARAM_INT); 
$sqlQuery->bindParam(':carIndex', $_POST['carIndex'], PDO::PARAM_INT); 
$sqlQuery->execute(); 

echo "<h1  align=center>Car updated</h1>";
   header('Refresh: 5; URL=adminlocked.php');
?>
