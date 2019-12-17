<?php


	session_start();
	
	if(isset($_SESSION['hitcount']))
	{
		$hitcount = $_SESSION['hitcount'];
		$_SESSION['hitcount'] = $hitcount+1;
	}
		else
		{
			$hitcount = 0;
			$_SESSION['hitcount']=$hitcount ;

		}
		
		echo "hit counter =".$_SESSION['hitcount'];
	
	
	 session_destroy();
	
?>
	