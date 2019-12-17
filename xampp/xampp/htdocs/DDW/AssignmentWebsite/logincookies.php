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
