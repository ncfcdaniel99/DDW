<?php
session_start();

/*


if(!isset($_SESSION['email'])){
    die("You are not registered");
}

if($_SESSION['role']!="user"){
    die("You Not User..!");
}
*/
?>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
<br>
<h2>Hi...!</h2> &nbsp;<br><font color="#456"><strong> <?=$_SESSION['name']?></strong></font>
<td>&nbsp;</td>
</tr>
</body>
</html>