<!DOCTYPE html>
<html lang="en-us">
<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="main">
				 <!-----start-main---->
				 <h1>Register As Member</h1>

           <form class="form-horizontal" action="register.handle.php" method="post">
             <fieldset>
               <div id="legend" class="">
                 <legend class="">Just One Step Before Enjoying Great Discounts</legend>
               </div>

             <div class="control-group">

                   <!-- Text input-->
                   <label class="control-label" name="username" for="input01">Username</label>
                   <div class="controls">
                     <input type="text" placeholder="" name="username" class="input-xlarge" required>
                   </div>
                 </div>

             <div class="control-group">

                   <!-- Text input-->
                   <label class="control-label" name="password" for="input01"><br>Password</label>
                   <div class="controls">
                    <p class="help-block" >
                       <font color=#0404B4>Our Restaurant regards your phone number as your password.</font></p>
                     <input type="text" name="password" class="input-large" required>
                   </div>
                 </div>

              <div class="control-group">
                       <!-- Text input-->
                   <label class="control-label" name="conpass" for="input01"><br>Confirm your password</label>
                   <div class="controls">
                     <input type="text" name="conpass" class="input-large" required>
                     <p class="help-block"><br><br></p>
                   </div>
                 </div>

             </fieldset>

								 <div class="submit">
									<button class="btn btn-lg btn-warning" type="submit">Create Member Account</button>
								</div>


						 </form>
		<!-----//end-main---->
		</div>

</body>
</html>
