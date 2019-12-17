
<?php
$username=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['savecookie']))
	{
		$savecookie=$_POST['savecookie'];
	}
else 
{
	$savecookie =false;
}
		if($savecookie ==true)
		{
			setcookie("username", $_POST['username'], time()+3600);
			setcookie("password", $_POST['password'], time()+3600);
			echo"Cookie saved";
		}
		else
		{
			echo"Cookie discarded";
		}
?>
<html>
<head>
<title>User Login Form </title>
</head>
<body>
<form action="logincookies.php" method="post">
Username: <input type="text" name="username" size=12 ><br>
Password: <input type="text" name="password" size=12><br>

  <input type="checkbox" name="savecookie"> I want to store a cookie<br>
  <input type="submit" value="Submit">


</form>
</body>
</html>
