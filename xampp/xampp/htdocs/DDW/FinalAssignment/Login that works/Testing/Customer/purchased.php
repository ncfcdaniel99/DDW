<!DOCTYPE html>
<html lang="en">
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
  <a class="navbar-brand" href="testing.php">
    <img src="logo.png" alt="logo" style="width:80px;">
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
      <a class="nav-link" href="Admin/adminlocked.php">Admin</a>
    </li>
	

  </ul>
</nav>

<?php
require_once 'init.php';

if($user->purchased)
{
	header('Location: index.php');
	exit();
	
}
?> 
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<p>You're about to buy a car</p>
<form action="purchase_car.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable'];?>"
    data-amount="125000"
    data-name="Website"
    data-description="Cars"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
	data-email="<?php echo $user->email;?>" 
	data-locale="auto"

    data-currency="gbp">
  </script>
</form>

</body>
</html>
