<?php
function load_make()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT make FROM cars ORDER BY make ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;

  $color='';
  $sqlColour=$pdo->prepare ('SELECT DISTINCT colour FROM cars ORDER BY colour ASC');
  $sqlColour ->execute();
  $color=$sqlColour->fetchAll();
  return $color;

  $reg='';
  $sql=$pdo->prepare('SELECT DISTINCT reg FROM cars ORDER BY reg ASC');
  $sql->execute();
  $reg=$sql->fetchAll();
  return $reg;

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/test.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


</head>     

<body>
    <div id="topbar" class="container-fluid">

        <nav class="topnav fixed-top">
        <div id="logo" style="border:0px; padding:0px; margin-top:-10px; margin-left:-10px;"><a href="navtest.php"><img alt="AutoDealers logo" src="./img/AutoDealersLogo.jpg"></a></div>
            <a id="contact-nav"class="nav-contact" href="contact.php" style="border-right: 1px solid #71db77;">Contact</a>
            <a id="about-nav"class="nav-about" href="about.php" style="border-right: 1px solid #71db77;">About</a>
            <div id="nav-right" class="navbar-right">
                <a id="login-nav"class="nav-login" href="logincookies.php" style="border-right: 1px solid #71db77;">Log In</a>
                <a id="register-nav"class="nav-register" href="register_action2.php">Register</a>
            </div>
        </nav>
    </div>

    <div class="fluid-container bg">

    <br><br><br><br><br><br>


        <div class="row" style="margin:auto">
            <form action="car-search.php" method="POST">
                <select class="mdb-select md-form" name="make" id="make" searchable="Search here.." onchange="updatesearch">
                    <option value="" selected="true" disabled="disabled">Select Make</option>
                    <?php
            $data=load_make();
            foreach ($data as $row): 
            echo '<option value="'.$row["make"].'">'.$row["make"].'</option>';
            ?>
                    <?php endforeach ?>
                </select>

                <select name="model" id="model" class="mdb-select md-form" searchable="Search here..">
                    <option value="" disabled selected>Select model</option>

                </select>
                <select name="color" id="color" class="mdb-select md-form" searchable="Choose colour.." onchange="updatesearch">
                    <option value="" selected="true">Choose colour</option>
                    <?php
                    $data=load_make();
                    foreach ($data as $row): 
                    echo '<option value="'.$row["colour"].'">'.$row["colour"].'</option>';
                    ?>
                    <?php endforeach ?>
                </select>
                <select name="reg" id="reg" class="mdb-select md-form" searchable="Choose reg.." onchange="updatesearch">
                    <option value="" selected="true">Choose reg</option>
                    <?php
                    $data=load_make();
                    foreach ($data as $row): 
                    echo '<option value="'.$row["reg"].'">'.$row["reg"].'</option>';
                    ?>
                    <?php endforeach ?>
                </select>
                <button>Submit</button>
            </form>
        </div>
        <br><br><br><br><br><br>


        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <footer style="background-color: #222222; color: #71db77;" class="footer">
        <div class="container">
            <span class="text-muted">This is a footer.</span>
        </div>
    </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/main.js"></script>

</body>
<script>
    $(document).ready(function () {
        $('#make').change(function () {

            var make_id = $(this).val();
            $.ajax({
                url: "fetchModel.php",
                method: "POST",
                data: {
                    makeId: make_id
                },
                success: function (data) {
                    $('#model').html(data);
                }
            })

        });
    });
</script>
</html>