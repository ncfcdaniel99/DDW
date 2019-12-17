<?php 
session_start();
		require ("config.php");
		
		require_once 'vendor/autoload.php';
		$email=$_POST['email'];
		
		$stmtt=$pdo ->prepare('SELECT * FROM customers WHERE email LIKE ?');
		$stmtt ->execute([$email]);
$query=$stmtt->fetch();
?>		
		
		 <form action="init.php" method="POST">
            Please enter preferred email:
            <br>
            <input type="text" name="email">
            <br>
			</div>
			
	<?php		
$_session['user_email'] = $email;
$stripe = [
'publishable' => 'pk_test_IX8LQppNpFiMwyufHugMsWpO00ROKeBLdE',
'private' => 'sk_test_zQc5qhwuUx333Wm0UacrSxev00XK5cKh8T '

];

Stripe::setApiKey($stripe['private']);

	$userQuery= $pdo->prepare("select id, email, password, purchased FROM customers WHERE email =:user_email");

$userQuery->execute(['user_email' => $_session['user_email']]);

	




$user = $userQuery->fetchObject();


?>