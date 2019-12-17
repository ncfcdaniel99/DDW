    <title>PHP Script to View Page Only After Login | PlanetGhost.com</title>
        <?php
    session_start() ;
    ?>
<head>
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

<div class="outputresults">
     <h2>Login Page</h2>
    <div class="form">
        <form action="loggingin.php" method="post">
		<div class="input-group">
            <label for="email">email</label>
            <input type="text" id="email" name="email"><br>
			</div>
		<div class="input-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
						</div>
		<div class="input-group">

  <input type="checkbox" name="savecookie"> I want to store a cookie<br>
  <input type="submit" value="Submit">

        </div>
		</form>
    </div>
	</div>
    </center>
    <style>
    .form{
        border: 1px solid #D3D3D3;
        text-align: center;
        width: 200px;
    }
    .success{
        background: none repeat scroll 0 0 #90EE90;
        width: 200px;
    	border: 1px solid darkgreen ;
    }
    .failure{
    background: none repeat scroll 0 0 #E56255 ;
     width: 200px;
    	border: 1px solid red ;
    }
    </style>