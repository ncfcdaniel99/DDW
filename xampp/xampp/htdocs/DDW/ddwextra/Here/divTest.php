


<html>
<head>
</head>
<body>
	<a href="#" id="myLink">Data</a>
	<a href="#" id="myLink2">Contact</a>
	<script type="text/javascript"http://code.jquery.com/jquery-latest.min.js></script>
	<script >
		$("#myLink").on("click",function()){
			$("#PageContent").load("test.php");
		}
		$("# myLink2").on("click",function()){
			$("#PageContent").load("test.php");
		}

	</script>
</body>
</html>