      <?php
    session_start() ;
	    if(!isset($_SESSION['auth']))
    {
    header("Location:adminlogin.php") ;
    }
    ?>
<head>
  <title>Automobile Trader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="../testing.php">
    <img src="../logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../testing.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../about.php">About</a>
    </li>
	
    <li class="nav-item">
	 <?php
    if(!isset($_SESSION['auth']))
    {
    ?>
    <a class="nav-link" href="adminlogin.php">Admin Login</a> 
    <?php
    }
    else
    {
    ?>
    <a class="nav-link" href="adminlogout.php">Admin Logout</a>
    <?php
     }
    ?>
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
</li>
  </ul>
</nav>



<div class="outputresults">


 <div class="col-sm-3">
        <form action="adminlocked2.php" method="POST">
            Please enter preferred carIndex:
            <br>
            <input type="text" class="form-control" name="carIndex">
 
	
            <input type="submit" name="submit" class="btn btn-danger" value="Search">
        </form>


<form action="adminlocked2.php" method="post">
 <select name="carIndex" id="carIndex" searchable="Search here">
            <option value="" selected="true" disabled="disabled">Select Car </option>
            <?php
            $data=load_carIndex();
            foreach ($data as $row): 
            echo '<option value="'.$row["carIndex"].'">'.$row["carIndex"].'</option>';
            ?>
            <?php endforeach ?>
            </select>
			
			  </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" style="display:inline" class="btn btn-danger" value="Search">


          </tr>
        <tr>

    </div>

  </div>
</div>


<?php function load_carIndex()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT carIndex FROM cars ORDER BY carIndex ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}


?>


<?php
require ("config.php");



    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $numberofrecords = 4;
    $offset = ($pageno-1) * $numberofrecords;

    $stmt = $pdo->prepare("SELECT * FROM cars ORDER BY carIndex "); 
    $stmt->execute([]);
    $totalnumberofrows = $stmt ->rowCount();
    $total_pages = ceil($totalnumberofrows / $numberofrecords);
    $stmt = $pdo->prepare("SELECT * FROM cars ORDER BY carIndex LIMIT $offset, $numberofrecords "); 
$stmt->execute();

?>
<br>

<div class="container">

 <div class="outputresults">

		          <input type="button" style="display:inline" onclick=window.location.href="carinsert.php" class="btn btn-danger" value="Add a car"> </td>


<?php

echo"<br>";
echo "<TABLE BORDER=1 width=600>";

while($row = $stmt->fetch())
{

		echo "<TR>";
		echo "<TD align=center>".$row['make']."</TD>";
		echo "<TD align=center>".$row['model']."</TD>";
		echo "<TD align=center>".$row['carIndex']."</TD>";
		echo "<TD align=center><a href='updateCarNewest.php?carIndex=".$row['carIndex']."'>Edit</a>";
		echo "<TD align=center><a href='deleteCar.php?carIndex=".$row['carIndex']."'>Delete Car</a>";
	echo "</TR>";
  }
echo "</TABLE>";

?>
<br>
      <ul class="pagination">
          <li ><a class="page-link" href="?pageno=1">First Page</a></li>
          <li <?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous Page</a>
          </li>
          <li  <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next Page</a>
          </li>
          <li><a class="page-link"  href="?pageno=<?php echo $total_pages; ?>">Last Page</a></li>
      </ul>
</div>
</body>
</html>
