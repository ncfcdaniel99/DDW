
<?php include("db.php");?>


<!DOCTYPE html>
<html>
<head>
  <title>Dropdown List Example</title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
      $("#make").change(function() {
        var make = $(this).val();
        if(make != "") {
          $.ajax({
            url:"get-models.php",
            data:{make_id:make},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              $("#model").html(resp);
            }
          });
        } else {
          $("#model").html("<option value=''>------- Select --------</option>");
        }
      });
    });

  </script>
</head>
<body>
  <form method="post">
    <label>Make :</label>
    <select name="make" id="make">
      <option value=''>------- Select --------</option>
      <?php 
        $db = new DbConnect;
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT *  FROM make");
        $stmt->execute();
        $makes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($makes as $make) 
        {
          echo "<option id='".$make['make']."' value='".$make['make']."'>".$make['make']."</option>";
        }
      ?>
    </select>
    
    <label>Model :</label>
    <select name="model" id="model"><option>------- Select --------</option></select>
  </form>
    
  
</body>
</html>




