<!DOCTYPE html>
<html lang="en">
<head>
  <title>Automobile Trader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark fluid">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="testing.php">
    <img src="logo.png" alt="logo" style="width:80px;">
  </a>
  
  <div class >
 <h1> Automobile Trader </h1>
  </div>
  <!-- Links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="testing.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="carResult.php">Search Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
	
	    <li class="nav-item">
      <a class="nav-link" href="Admin/adminlocked.php">Admin Login</a>
    </li>
	

  </ul>
</nav>

<div class="cardeals" id="cardeals">
  <div class="container">
  <h1>Latest Car Deals</h1>
    <div class="row">
	
	
	
	
      <?php 
      require 'config.php';
      $sqlQuery=$pdo->query('SELECT * FROM cars  ORDER BY RAND() DESC LIMIT 3');
      while($row = $sqlQuery->fetch())
      {
        ?>
		
	
  <div class="courseimage">
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	   <A href='<?php echo "searchCars.php?carIndex=".$row['carIndex'].""; ?>'/>  

      <img class="carimage"  src="<?php echo 'pictures/'.$row['picture'];?>" alt="Car">
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
          

      <div class="courseimage">
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
   <A href='<?php echo "searchCars.php?carIndex=".$row['carIndex'].""; ?>'/>  
  <img  class="carimage" src="<?php echo 'pictures/'.$row['picture'];?>" alt="Car">
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
	

      <?php } ?> 
      
    </div> 
  </div>  
</div>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("courseimage");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>



      
      
</body>
</html>
