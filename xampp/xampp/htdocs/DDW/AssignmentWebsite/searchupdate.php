<?php
if ($make != '') {
       $sql1 = "SELECT * FROM model WHERE make=" . $make;
       $result1 = mysql_query($sql1);
       echo "<select name='model'>";
       echo "<option value=''>Select</option>"; 
       while ($row = mysql_fetch_array($result1)) {
          echo ' <option value="'. $model["model"].'">'. $model["model"].'</option>";}
       echo "</select>";
    }
    else
    {
        echo  '';
    }
	
?>