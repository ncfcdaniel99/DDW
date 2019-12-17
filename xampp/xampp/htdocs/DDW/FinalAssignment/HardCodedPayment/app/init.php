<?php 
session_start();
		require ("config.php");
		
		require_once 'vendor/autoload.php';
$_session['user_id'] = $_POST['id'];
$stripe = [
'publishable' => 'pk_test_IX8LQppNpFiMwyufHugMsWpO00ROKeBLdE',
'private' => 'sk_test_zQc5qhwuUx333Wm0UacrSxev00XK5cKh8T '

];

Stripe::setApiKey($stripe['private']);

	$userQuery= $pdo->prepare("select id, email, password, purchased FROM customers WHERE id =:user_id");

$userQuery->execute(['user_id' => $_session['user_id']]);

$priceQuery= $pdo->prepare("select price FROM cars WHERE carIndex =:carIndex");





$user = $userQuery->fetchObject();
$carprice = $priceQuery->fetchObject();

?>