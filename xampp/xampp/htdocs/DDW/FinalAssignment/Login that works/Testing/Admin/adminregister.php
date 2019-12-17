<!DOCTYPE html>
<html>
<head>	  <link rel="stylesheet" href="../main.css">
	<link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
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
      <a class="nav-link" href="../searchCars.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
	
	    <li class="nav-item">
      <a class="nav-link" href="../login.php">Admin Login</a>
    </li>
  </ul>
</nav>


<!DOCTYPE html>
<html>
    <head>
   
	<link rel="stylesheet" type="text/css" href="../style.css">
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
		<div class="outputresults">

    <form action="adminregistercode.php" method="post" > 
    User Name: <input type="text" class="form-control"  name="username" maxlength="20" required >
	  Password: <input type="password" class="form-control" name="password" minlength="4" maxlength="20" required>
	

	<input type="submit" class="form-control" value="Register">




    
        </form>

      
    </body>
  

</html>