
<?php
session_start();
$con=mysqli_connect("localhost","root","","carstore");
if(isset($_POST['btnSubmit'])){
    $textEmail=$_POST['txtEmail'];
    $textPassword=$_POST['txtPass'];

    $sql="SELECT * FROM login where email_id='{$textEmail}' and password='{$textPassword}'";
    $result=mysqli_query($con,$sql); //executing the query and storing the incoming data in $ result
    if(mysqli_num_rows($result)==1)
    {
        $query=mysqli_fetch_array($result);
        $_SESSION['name']=$query['name'];
        $_SESSION['email']=$query['email'];
        $_SESSION['role']=$query['role'];
        if($query['role']=="admin"){
            header("location:adminpanel.php");
        }else if($query['role']=="user"){
            header("location:index.php");
        }
    }

}

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

        <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4" style="padding-top: 100px;">
                    <form action="login.php" method="post">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                LOGIN
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="txtEmail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="txtPass" class="form-control">
                                </div>
                                <div class="form-group">

                                    <input type="submit" name="btnSubmit" class="form-control btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        </body>

</html>