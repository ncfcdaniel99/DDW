$(document).ready(function() {
  $("#make").change(function() {
    var make = $(this).val();
    if(make != "") {
      $.ajax({
        url:"newsearch.php",
        data:{c_id:make},
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