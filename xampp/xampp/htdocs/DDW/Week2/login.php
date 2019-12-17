<?php

$username = $_POST['uName'];
$password = $_POST['pWord'];


if($username =="Daniel" && $password == 78910)
	
	{
		echo "You are now logged in";
	}
	else
	{
		echo "That is incorrect! Access Denied";
	}
?>