<html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Restaurant!</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

</head>

<body>


<div class="signin">
	<div class="signin-head"><img src="images/test/customer2.jpeg" alt="" class="img-square"></div>
	<form class="form-signin" role="form" name="form" action="index.handle.php" method="post">
		<input type="text" class="form-control" name="username" id="username" placeholder= "Username" required autofocus />
		<input type="text" class="form-control" name="password" id="password" placeholder= "Phone Number" required />
		<button class="btn btn-lg btn-warning btn-block" type="submit">Member Login</button>
	</form>

	<form class="form-signin" role="form" name="form" method="post">
 		<div class="col-xs-6 link">
						<p class="text-center remove-margin"><a href="register.php" ><medium>Register As A Member</medium></a>
						</p>
		</div>
		<div class="col-xs-6 link">
						<p class="text-center remove-margin"><a href="guest.handle.php" ><medium>Continue As Regular Customer</medium></a>
						</p>
		</div>
	</form>
	<form class="form-signin" role="form" name="form" action="admin.php" method="post">
		<button class="btn btn-lg btn-warning btn-block" type="submit">Go To Admin Login</button>
	</form>
</div>


</body>
</html>
