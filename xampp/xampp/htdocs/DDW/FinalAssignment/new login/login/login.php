<?PHP
$uname = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'config.php';

 $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

 $pword = $_POST['password'];



if(isset($_POST['login'])){

 $sql = "SELECT email, password FROM customers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    
	$result =  $stmt->fetch(PDO::FETCH_ASSOC);

		if ($result->num_rows == 1) {

			$db_field = $result->fetch_assoc();

			if (password_verify($pword, $db_field['L2'])) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: page1.php");
			}
			else {
				$errorMessage = "Login FAILED";
				session_start();
				$_SESSION['login'] = '';
			}
		}
		else {
			$errorMessage = "username FAILED";
		}
	}
}
?>


<html>
<head>
<title>Basic Login Script</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P align = center>
            <input type="submit" name="login" value="Login">
</P>

</FORM>

<P>
<?PHP print $errorMessage;?>




</body>
</html>