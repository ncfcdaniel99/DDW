<?php

require_once 'init.php';
?>

<?php if($user->purchased): ?>
<p> You have purchased!</p>
<?php else: ?>
<p> You have not purchased <a href="purchased.php ">"Get a car"</a></p>
<?php endif; ?>