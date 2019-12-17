<?php include "config.php"; ?>
<script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<table>
  <tr>
    <td>Country</td>
    <td>
       <!-- Country dropdown -->
       <select id='sel_country' >
          <option value='0' >Select Country</option>
          <?php 
          ## Fetch countries
          $stmt = $conn->prepare("SELECT * FROM cars");
          $stmt->execute();
		$results=$stmt->fetchAll();
		
          foreach($results as $make){
             echo "<option value='".$make['make']."'>".$make['make']."</option>";
          }
          ?>
       </select>
    </td>
  </tr>

  <tr>
    <td>Make</td>
    <td>
      <select id='make' >
         <option value='0' >Select Make</option>
      </select>
    </td>
  </tr>

  <tr>
    <td>model</td>
    <td>
      <select id='model' >
        <option value='0' >Select Model</option>
      </select>
    </td>
  </tr>
</table>
<script>
$(document).ready(function(){

  // Country
  $('#sel_country').change(function(){

     var make = $(this).val();

     // Empty state and city dropdown
     $('#make').find('option').not(':first').remove();
     $('#model').find('option').not(':first').remove();

     // AJAX request
     $.ajax({
       url: 'ajaxfile.php',
       type: 'post',
       data: {request: 1, make: model},
       dataType: 'json',
       success: function(response){

         var len = response.length;

         for( var i = 0; i<len; i++){
           var id = response[i]['id'];
           var name = response[i]['name'];

           $("#model").append("<option value='"+id+"'>"+name+"</option>");

         }
       }
     });

  });

  // State
  $('#model').change(function(){
     var model = $(this).val();

     // Empty city dropdown
     $('#make').find('option').not(':first').remove();

     // AJAX request
     $.ajax({
       url: 'ajaxfile.php',
       type: 'post',
       data: {request: 2, stateid: stateid},
       dataType: 'json',
       success: function(response){

         var len = response.length;

         for( var i = 0; i<len; i++){
           var id = response[i]['id'];
           var name = response[i]['name'];

           $("#colour").append("<option value='"+id+"'>"+name+"</option>");

         }
       }
     });
   });
});
</script>