<?php
$host = 'localhost';
$db   = 'carstore';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [    
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,    
PDO::ATTR_EMULATE_PREPARES   => false,];

try 
{    
	$pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{     
	throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Make</font> </td> 
          <td> <font face="Arial">Model</font> </td> 
          <td> <font face="Arial">Reg</font> </td> 
          <td> <font face="Arial">Colour</font> </td> 
          <td> <font face="Arial">Miles</font> </td> 
          <td> <font face="Arial">Price</font> </td> 
          <td> <font face="Arial">Dealer</font> </td> 
          <td> <font face="Arial">Town</font> </td> 
          <td> <font face="Arial">Telephone</font> </td> 
          <td> <font face="Arial">Description</font> </td> 
          <td> <font face="Arial">Car Index</font> </td> 
          <td> <font face="Arial">Region</font> </td> 
      </tr>';
$sqlQuery=$pdo -> query('SELECT * FROM cars WHERE town="Peterborough"');

while($row=$sqlQuery->fetch())
{
		
        $field1name = $row["make"];
        $field2name = $row["model"];
        $field3name = $row["Reg"];
        $field4name = $row["colour"]; 
        $field5name = $row["miles"];
        $field6name = $row["price"];
        $field7name = $row["dealer"];
        $field8name = $row["town"]; 
        $field9name = $row["telephone"];
        $field10name = $row["description"];
        $field11name = $row["carIndex"]; 
        $field12name = $row["region"];
        
 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
                  <td>'.$field8name.'</td> 
                  <td>'.$field9name.'</td> 
                  <td>'.$field10name.'</td> 
                  <td>'.$field11name.'</td> 
                  <td>'.$field12name.'</td>
                  <td><a href="getcar.php?carIndex='.$field11name.'">More info</a><td>
                  
              </tr>';
              
}

echo "</table>";
 

?>