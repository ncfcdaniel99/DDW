       <?php
    session_start() ;
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
      <a class="nav-link" href="#">About</a>
    </li>
	
	
    <li class="nav-item">
	 <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a class="nav-link" href="login.php">Customer Login</a> 
    <?php
    }
    else
    {
    ?>
    <a class="nav-link" href="logout.php">Customer Logout</a>
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

     <h1 align="center">Customer Login Page</h1>
    <div class="form">
        <form action="customerloggingin.php" method="post">
			 	<div class="outputresults">
            <label for="email">email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"><br>
			</div>
			 	<div class="outputresults">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password"><br>
						</div>
			 	<div class="outputresults">

  <input type="checkbox" name="savecookie"> I want to login<br>
  <input type="submit" class="btn btn-danger" value="Submit">

  

        </div>
		</form>
			 	<div class="outputresults">

    <h2>Don't have an account?  </h2></br>
  <input type="submit" class="btn btn-danger" onclick="window.location.href = 'customerregister.php';" value="Customer Sign up">


    </div>
  