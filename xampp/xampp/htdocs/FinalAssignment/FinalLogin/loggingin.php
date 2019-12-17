    <?php
    session_start() ;
    $user_id = $_POST['user_id'] ;
    $user_passwd = $_POST['user_passwd'] ;
    if($user_id =="john" && $user_passwd =="john@123")
    {
    $_SESSION['success'] =  "Correct";
    }
    else
    {
    $_SESSION['failure'] =  "Incorrect";
    }
    header("Location:index.php") ;
    ?>