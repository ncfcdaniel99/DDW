<?php

if(!isset($_GET['username']))
{
	$username="Not data supplied";
}
else
{
	$username=$_GET['username'];
}
if(!isset($_GET['password']))
{
	$password="Not data supplied";
}
else
{
	$password=$_GET['password'];
}

echo "username=".$username."<br>";
echo "password=".$password."<br>";

?>