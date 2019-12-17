<?php
$con=mysqli_connect("localhost","root","","carstore");
if(isset($_POST['btnSubmit'])){
    $textName=$_POST['txtName'];
    $textEmail=$_POST['txtEmail'];
    $textPassword=$_POST['txtPass'];
    $role="user";

    $sql = "insert into login(name, email_id, password,role)
                values('".$textName."', '".$textEmail."', '".$textPassword."', '".$role."')";
    $result = mysqli_query($con, $sql);
  //  echo "<script>alert(\"User Addes Succesfully!\"); </script>";
   header("Location:index.php");


}
?>
<!DOCTYPE HTML>
<html>
<head>

    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4" style="padding-top: 100px;">
            <form action="signup.php" method="post">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        User Registration
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="txtName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="txtEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="txtPass" class="form-control">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="btnSubmit" class="form-control btn btn-success" value="Register">
                        </div>
                    </div>
                </div>
            </form>

    </div>
</div>
</body>
</html>
