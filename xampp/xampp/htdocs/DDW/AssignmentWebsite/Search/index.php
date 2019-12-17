<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
 <script type="text/javascript">
function updatesearch() { // Call to ajax function
    var make = $('#make').val();
    var dataString = "make="+make;
    $.ajax({
        type: "POST",
        url: "searchupdate.php", // Name of the php files
        data: dataString,
        success: function(html)
        {
            $("#get_make").html(html);
        }
    });
}
</script>
<?php include("db.php");?>
<div class="">
    <label>Make :</label>
    <select name="make" id="make" onchange="updatesearch();">
      <option value=''>------- Select --------</option>
      <?php 
      $sql = "select * from cars";
      $res = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_object($res)) {
          echo "<option value='".$row->make."'>".$row->make."</option>";
        }
      }
      ?>
    </select>
    
    <label>Make :</label>
    <select name="model" id="model"><option>------- Select --------</option></select>
  </div>
 