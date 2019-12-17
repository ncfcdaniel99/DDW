<?php

session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form using jQuery Ajax and PHP MySQL</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link href="style.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body>
<br />
<br />
<br />

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading" style="text-align:center;">LOG IN to SOURCECODESTER</h2><hr />
        
		<div class="alert alert-info" role="alert">
			Email: <b style="color:blue;">rolyn02@gmail.com</b>
		<br />
		<br />
			Password: <b style="color:blue;">password</b>
		</div>
		
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="usernamae" class="form-control" placeholder="Email address" name="username" id="username" autofocus="autofocus" />
      
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
        </div>  
      
		</form>
	  
    </div>
    
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>