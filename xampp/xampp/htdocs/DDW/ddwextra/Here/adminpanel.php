<?php

session_start();
/*
if(!isset($_SESSION['email'])){
    die("You are not registered");
}
if($_SESSION['role']!="admin"){
    die("You are not an admin");
}
*/
?>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
<br>
<h2>Welcome...!</h2> &nbsp;<br><font color="#456"><strong> <?=$_SESSION['name']?></strong></font>&nbsp;||&nbsp;<a href="logout.php">Log Out&nbsp;&nbsp;</a></td>
<td>&nbsp;</td>
</tr>
</body>
</html>
