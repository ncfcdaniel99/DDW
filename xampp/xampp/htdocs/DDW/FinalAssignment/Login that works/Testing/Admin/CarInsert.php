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
</nav>
<div class="outputresults">


<form action="insertCar.php" method="post"> 


	Make: <input type="text" class="form-control" required name="make" >
	Model: <input type="text" class="form-control" required name="model" >
	Reg: <input type="text" class="form-control" maxlength="1" required name="Reg"><br>
	Colour: <input type="text" class="form-control" required name="colour">
	Miles: <input type="text" class="form-control" required name="miles" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
	Price: <input type="text" class="form-control" required name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br>
	Dealer: <input type="text" class="form-control" required name="dealer" >
	Town: <input type="text" class="form-control" required name="town" >
	Telephone: <input type="text" class="form-control"  required name="telephone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br>
	Description: <input type="text" class="form-control" required name="description">
	Region: <input type="text" class="form-control" required name="region">
	Picture: <input type="text" class="form-control" required name="picture" ><br>
	<input type="submit" value="Insert the Car">
 
</form>

</body>
</html>