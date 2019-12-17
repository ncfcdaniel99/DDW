<?php 
require_once 'init.php';

if(isset($_POST['stripeToken']))
{
	$token = $_POST['stripeToken'];
	
	try{
		Stripe_Charge::create([
  "amount" => 125000,
  "currency" => 'gbp',
  "card" => $token,
  "description" => $user->email
]);


$pdo->query("UPDATE customers SET purchased = 1 WHERE id = {$user->id}");



	} catch(Stripe_CardError $e)
	
	{
		
		
	}
	$_SESSION['success'] =  "Successfully Logged In";
	$_SESSION['auth'] = 1 ;
	$URL =isset($_SESSION['redirectme']) ? $_SESSION['redirectme']: 'customerloginverification.php';
	header('location:'.$URL.'');
	exit();
	
};
?>