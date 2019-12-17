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
    data-amount="<?php echo $carprice->price;?>"
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
