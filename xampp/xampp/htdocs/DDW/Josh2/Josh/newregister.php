<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
  crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/custom.css">
</head>

<body>
  <div class="container-fluid bg">

    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">

          <div class="form-group">
            <h1>Auto Dealers Register</h1>
			<label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
              placeholder="Enter an email">

              <label for="firstname">First Name:</label>
            <input type="name" name="firstname" class="form-control" id="firstname" aria-describedby="first_name"
              placeholder="Enter your forename">

              <label for="lastname">Last Name:</label>
            <input type="name" name="lastname" class="form-control" id="lastname" aria-describedby="last_name"
              placeholder="Enter you surname">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <button type="submit" name="Register" class="btn btn-success btn-block">Submit</button>
        </form>

      </div>
      <div class="col-md-4 col-sm-4 col-xs-12"></div>

    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/main.js"></script>

</body>

</html>