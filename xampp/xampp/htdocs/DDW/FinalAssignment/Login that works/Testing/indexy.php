    <?php
    session_start() ;
    ?>
    <title>PHP Script to View Page Only After Login | PlanetGhost.com</title>
    <center>
    <h3>PHP Script to View Page Only After Login(Demo)</h3>
    <b><a href="index.php">HOME</a></b> | <a href="locked.php">Locked Page</a> |  
    <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a href="login.php">Login</a> 
    <?php
    }
    else
    {
    ?>
    <a href="logout.php">Logout</a>
    <?php
     }
    ?>
    <h2>Home Page</h2>
    <?php
    if(isset($_SESSION['success']))
    {
    ?>
    <div class="success">

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