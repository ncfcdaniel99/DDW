<?php
if(!isset($_GET['username']))
{
	$username="No data supplied";
}

else{
	

	$username = $_GET['username'];
}


if(!isset($_GET['password']))
{
	$password="No password supplied";
}

else{
	

	$password = $_GET['password'];
}

echo "username = ".$username."<br>";
echo "password = ".$password."<br>";
?>
http://localhost/ddw/Week4/usingGet.php?username=Daniel&password=1234