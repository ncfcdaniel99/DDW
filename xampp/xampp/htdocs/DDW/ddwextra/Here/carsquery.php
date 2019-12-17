
<!DOCTYPE html>
<html>
<head>
	<title>Load Select List PDO</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#makes").change(function(){
				var makeid = $("#makes").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'makeid=' + makeid
				}).done(function(models){
					console.log(books);
					models = JSON.parse(models);
					$('#models').empty();
					models.forEach(function(model){
						$('#model').append('<option>' + model.model + '</option>')
					})
				})
			})
		})
	</script>
	
</head>
<body>
	<div class="formcontent">
		<h2>Search Car</h2>
		<form role="form" method="post">
			<label for="Regions">Region:</label>
			<input type="text" name="region">
			<label>Make:</label>
			<select id="makes" name="makes">
				<option selected="" disabled="">Select Make</option>
		                    	<?php 
		                    		require 'data.php';
		                    		$makes = loadMakes();
		                    		foreach ($makes as $make) {
		                    			echo "<option id='".$make['make']."' value='".$make['make']."'>".$make['make']."</option>";
		                    		}
		                    	 ?>
		   </select>
			<label>Select Model:</label>
			<select id="models" name="models">	

			</select>
			

			<input id="searchBtn" type="submit" name="searchcar" value="Search">

		</form>
	</div>

</body>
</html>