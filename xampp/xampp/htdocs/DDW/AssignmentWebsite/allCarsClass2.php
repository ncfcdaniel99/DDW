    <form action="databaseTemplate4.php" method="post"> 
<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","allCarsClass.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<select name="users" onchange="showUser(this.value)">
    <?php 
	require ("config.php");
	$sql="select * from cars group by make";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$results=$stmt->fetchAll();
	
	
	foreach($results as $make): ?>
       <?php echo ' <option value="'. $make["carIndex"].'">'. $make["make"].'</option>'; ?>
    <?php endforeach; ?>
</select>
<div id="txtHint"><b>Person info will be listed here.</b></div>



?>



