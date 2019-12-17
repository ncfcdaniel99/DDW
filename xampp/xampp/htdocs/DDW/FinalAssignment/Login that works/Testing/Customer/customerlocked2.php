      <?php
    session_start() ;
	    if(!isset($_SESSION['auth']))
    {
    header("Location:customerlogin.php") ;
    }
    ?>
<head>
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
    <img src="../logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../about.php">About</a>
    </li>
	
	    <li class="nav-item">
      <a class="nav-link" href="customeroradmin.php">Admin L</a>
    </li>
	
    <li class="nav-item">
	 <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a class="nav-link" href="customerlogin.php">Customer Login</a> 
    <?php
    }
    else
    {
    ?>
    <a class="nav-link" href="customerlogout.php">Customer Logout</a>
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
</nav>
<div class="outputresults">


 <?php
require ("config.php");

$carIndex=$_GET['carIndex'];
$sqlQuery = $pdo->prepare('SELECT * FROM cars WHERE carIndex = :carIndex');
$sqlQuery->execute(['carIndex' => $carIndex]);

;

while($row = $sqlQuery->fetch())
{
echo "<TC>";
echo "You have chosen to purchase the ".$row['make'];
echo ", ".$row['model'];
echo "<br> From ".$row['dealer'];
echo " in ".$row['town'];


echo"<form class=credit-card>";
echo" <div class=form-header>";
echo"    <h4 class=title>Credit card detail</h4>";
echo"</div>";
 
echo" <div class=form-body>";

echo"   <input type=text class=card-number placeholder=Card Number>";
 
 
    echo"  <div class=date-field>";
    echo"     <div class=month>";
    echo"      <select name=Month>";
    echo"        <option value=january>January</option>";
    echo"         <option value=february>February</option>";
    echo"         <option value=march>March</option>";
    echo"         <option value=april>April</option>";
    echo"         <option value=may>May</option>";
    echo"       <option value=june>June</option>";
    echo"       <option value=july>July</option>";
    echo"      <option value=august>August</option>";
          echo"      <option value=september>September</option>";
          echo"       <option value=october>October</option>";
          echo"       <option value=november>November</option>";
          echo"        <option value=december>December</option>";
          echo"       </select>";
        echo"     </div>";
        echo"    <div class=year>";
        echo"      <select name=Year>";
    
        echo"   <option value=2020>2020</option>";
        echo"       <option value=2021>2021</option>";
        echo"       <option value=2022>2022</option>";
        echo"        <option value=2023>2023</option>";
        echo"        <option value=2024>2024</option>";
        echo"      </select>";
        echo"     </div>";
        echo"   </div>";
        echo"     <div class=cvv-input>";
        echo"       <input type=text onkeypress=return onlyNumberKey(event) ";
        echo"                maxlength=3   placeholder=CVV >";
        echo" </div>";
        echo" <div class=cvv-details>";
        echo"   <p>3 or 4 digits usually found <br> on the signature strip</p>";
        echo"  </div>";
        echo" </div>";
 
 
    
    

 echo " </div>";
echo "</form>";
echo"<button type=submit class=proceed-btn><a href=#>Proceed</a></button>";
echo"  <button type=submit class=paypal-btn><a href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchase</button>";

echo "<br>You can collect the car on:";

echo date('l jS F Y', strtotime('+7 days'));
echo"<br>";
echo"You will need to bring the following information when you collect the car: <br>";
echo"<ul> <li>Driving Licence <br> </li>";
echo" <li>Insurance Documents <br> </li>";
echo" <li> Proof of Purchase <br> </li></ul>";

echo"Use the following websites to get your car insurance:";
echo"<ul> <li>Driving Licence <br> </li>";
echo" <li>Insurance Documents <br> </li>";
echo" <li> Proof of Purchase <br> </li></ul>";


echo "<div class=purchasebutton onclick=location.href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchase</div>";

echo "<TD align = center ><a href='updateCarValue.php?carIndex=".$row['carIndex']."'>Complete Purchse</a>";
	echo"";
	echo "<TC>";

echo "<TR>";
  }

?>


<br>
<script> 
    function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script> 
</div>
</body>
</html>
