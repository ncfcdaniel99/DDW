<?php
    session_start();

    require 'config.php';

    $username = $_POST['username'];
    $pwd = $_POST['password'];


    if(isset($_POST['login']))
    {
        $username = !empty($_POST['username']) ?  trim($_POST['username']) : null;
        $passattempt = !empty($_POST['password']) ?  trim($_POST['password']) : null;

        $sql = "SELECT username, password FROM users WHERE username = :username";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user === false)
        {
            echo('Incorrect username or password. Please try again.');

        }

        else
        {
            $validPass = pass_verify($passattempt, $user['password']);
            if($validPass)
            {
                header('Location: register.php');
                exit();
            }
            else
            {
                echo"Incorrect username or password. Please try again.";
            }
        }
    }
	
?>