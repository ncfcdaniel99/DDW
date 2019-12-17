<?php
$firstnumber = $_POST['number1'];
$secondnumber = $_POST['number2'];
$calculation = $_POST['symbol'];

	if ($calculation	== "add")
	{
		echo "It is ".($firstnumber+$secondnumber);
	}
	if ($calculation == "subtract")
		
	{
		echo "It is ".($firstnumber-$secondnumber);
	}	
	if ($calculation	== "multiply")
	{
		echo "It is ".($firstnumber*$secondnumber);	
	}
	if ($calculation	== "divide")	
	{
		echo "It is ".($firstnumber/$secondnumber);
	}
	


?>