<?php 
require 'config.php';
@$make=$_GET['make'];

function load_make()
{
  $data='';
  require 'config.php';
  $sqlMake=$pdo->prepare('SELECT DISTINCT make FROM cars ORDER BY make ASC');
  $sqlMake ->execute();
  $data=$sqlMake-> fetchAll();
  return $data;
}

function load_model($make)
{
    $modeldata='';
    require 'config.php';
    $sqlModel=$pdo->prepare('SELECT DISTINCT model FROM cars WHERE make = "'.$make.'"');
    $sqlModel ->execute();
    $modeldata=$sqlModel-> fetchAll();
    return $modeldata;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>AutoDealers</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/custom.css">

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/main.js"></script>
  <SCRIPT language=JavaScript>

  function reloadMake(form)
  {
  var val=form.make.options[form.make.options.selectedIndex].value;
  self.location='index.php?make=' + val ;
  }
  
  function disableselect()
  {
  <?Php
  if(isset($make) and strlen($make) > 0){
  //echo "document.getElementById('make').disabled = true;";}
  //else{echo "document.getElementById('make').disabled = false;";
  }
  ?>
  }
  </script>
</head>

<body onload=disableselect();>
  <div id="topbar" class="container-fluid" style="margin: 0 0 0 0; padding: 0 0 0 0;">
    <nav class="topnav sticky-top" style="background-color: darkgrey;">
      <a id="nav-home" href="index.php" style="border-right: 1px solid rgba(255,255,255,0.2);">Home</a>
      <a id="nav-search" href="car-search.php" style="border-right: 1px solid rgba(255,255,255,0.2);">Search</a>
      <a id="nav-contact" href="contact.php" style="border-right: 1px solid rgba(255,255,255,0.2);">Contact</a>
      <a id="nav-about" href="about.php">About</a>
      <h1 class="brand">Auto Dealers</h1>
      <a id="nav-contact" href="signin.html" style="border-right: 1px solid rgba(255,255,255,0.2);">Sign In</a>
      <a id="nav-contact" href="register.html" style="border-right: 1px solid rgba(255,255,255,0.2);">Sign Up</a>
    </nav>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="search-engine">
          <legend>Search for a car</legend>
          <?Php
        $quer2=load_make();
        
        
        
        if(isset($make) and strlen($make) > 0) {
            $quer=load_model($make);
        }

        echo "<form method=post name=f1 action='car-search.php'>";

        echo "<select name='make' id='make' onchange=\"reloadMake(this.form)\"><option value=''>Select one</option>";
        //while($cars2 = mysql_fetch_array($quer2)) { 
    
              foreach ($quer2 as $row){
                if(isset($make)) {
                  if($row['make']==$make ) {
                    echo '<option value="'.$row["make"].'" selected>'.$row["make"].'</option>';
                }
                }else
                {
              echo '<option value="'.$row["make"].'">'.$row["make"].'</option>';
            }
            }
        
        echo "</select>";

        if(isset($make))
        {
            echo "<select name='model' id='model' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
              foreach ($quer as $row)
              {
                if(isset($model))
                {
                  if($row['model'] == $model)
                  {
                    echo '<option value="'.$row["model"].'" selected>'.$row["model"].'</option>';
                  }
                }
                else
                {
                  echo '<option value="'.$row["make"].'">'.$row["make"].'</option>';

                }

              }
        
        echo "</select>";
        }
            
        echo "<input type=submit value=Submit>";
        echo "</form>";
   
    ?> 
        </div>
      </div>
      <div class="col-2"></div>
    </div>
    <div class="row">
    <div class="col-2">
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
    </div>
    <div class="col-2">
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
  </div>
  </div>

</body>

</html>
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