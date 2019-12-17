    <title>PHP Login Script with Session | PlanetGhost.com</title>
    <center>
    <h3>Login Script in PHP with Session Message(Demo)</h3>
    <?php
    session_start() ;
    if(isset($_SESSION['success']))
    {
    ?>
    <div class="success">
    <?php echo $_SESSION['success'] ; ?>
    </div>
    <?php
    unset($_SESSION['success']) ;
    }
    if(isset($_SESSION['failure']))
    {
    ?>
    <div class="failure">
    <?php echo $_SESSION['failure'] ;?>
    </div>
    <?php
    unset($_SESSION['failure']) ;
    }
    ?>
    <div class="form">
    <form action="loggingin2.php" method="post">
    User Name: <input type="text" name="email"><br>
    Password : <input type="password" name="password"><br>
	  <input type="checkbox" name="savecookie"> I want to store a cookie<br>

    <input type="submit" value="login"><br>
    </form>
    </div>
    </center>
    <style>
    .form{
        border: 1px solid #D3D3D3;
        text-align: center;
        width: 200px;
    }
    .success{
        background: none repeat scroll 0 0 #90EE90;
        width: 200px;
    	border: 1px solid darkgreen ;
    }
    .failure{
    background: none repeat scroll 0 0 #E56255 ;
     width: 200px;
    	border: 1px solid red ;
     
    }
    </style>