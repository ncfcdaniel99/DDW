<?php
require 'config.php';
$output='';
$make=$_POST['makeID'];
$sqlQuery=$pdo -> prepare('SELECT DISTINCT Reg FROM cars WHERE model = ? ORDER BY Reg ASC');
$sqlQuery ->execute([$model]);
while($row=$sqlQuery->fetch())
{
    $output .= '<option value="'.$row["Reg"].'">'.$row["Reg"].'</option>';
}

echo $output;


?>