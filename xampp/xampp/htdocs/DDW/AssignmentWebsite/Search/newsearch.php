    <?php include("db.php"); ?>
    <?php
    if(isset($_POST['make'])) {
      $sql = "select * from cars where make='".$_POST['make']."'";
      $res = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0) {
        echo "<option value=''>------- Select --------</option>";
        while($row = mysqli_fetch_object($res)) {
          echo "<option value='".$row->model."'>".$row->model."</option>";
        }
      }
    } else {
      header('location: ./');
    }
    ?>