<?php 
require_once 'init.php';

if(isset($_POST['stripeToken']))
{
	$token = $_POST['stripeToken'];
	
	try{
		Stripe_Charge::create([
  "amount" => $carprice->price,
  "currency" => 'gbp',
  "card" => $token,
  "description" => $user->email
]);


$pdo->query("UPDATE customers SET purchased = 1 WHERE id = {$user->id}");



	} catch(Stripe_CardError $e)
	
	{
		
		
	}
	
	header('Location: index.php');
	exit();
	
};
?>