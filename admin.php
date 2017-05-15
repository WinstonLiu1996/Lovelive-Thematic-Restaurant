<html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login Page</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

</head>

<body>
<div class="signin">
	<div class="signin-head"><img src="images/test/admin.jpeg" alt="" class="img-square"></div>
	<form class="form-signin" role="form" name="form" action="admin.handle.php" method="post">
		<input type="text" class="form-control" name="adminusername" id="adminusername" placeholder="Name" required autofocus />
		<input type="text" class="form-control" name="adminpassword" id="adminpassword" placeholder="ID" required />
		<button class="btn btn-lg btn-warning btn-block" type="submit">Admin Login</button>
	</form>
	<form class="form-signin" role="form" name="form" action="index.php" method="post">
		<button class="btn btn-lg btn-warning btn-block" type="submit">Go Back To Customer Login</button>
	</form>
</div>

	


</body>
</html>
