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
      <a class="nav-link" href="../about.php#">About</a>
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
        <h1 align="center">Register</h1>
		<div class="outputresults">

    <form action="customerregistercode.php" method="post" > 
    First Name: <input type="text" class="form-control"  name="firstname" maxlength="20" required >
	Last Name: <input type="text" class="form-control"  name="lastname" maxlength="20" required>
	Email: <input type="email" class="form-control" name="email"  maxlength="60" required><br>
	Password: <input type="password" class="form-control" name="password" minlength="4" maxlength="20" required>
	Address: <input type="text" class="form-control" name="address" maxlength="40" required>
	Postcode: <input type="text" class="form-control" name="postcode" maxlength="7" required><br>
  Phone Number: <input type="text"   class="form-control" name="phonenumber" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required >

	<input type="submit" class="form-control" value="Register">




    
        </form>

      
    </body>
  

</html>