<!doctype html>
<html lang="en">
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" >
	<title>Payment Confirmation</title>
</head>

<body>
	

	<div class="main">
		<h1>Payment Confirmation</h1>

		 <form class="form-horizontal" action="payment.handle.php" method="post">
		    	<fieldset>
		<div id="legend" class="">
                 <legend class="">Here is your bill, Customer No.<?php $cid = $_COOKIE['CID']; echo $cid?></legend>
        </div>

        <div class="control-group">
        	<?php
        	echo "Processed date and time of this bill: <br>";
        	echo "Date: " . $_COOKIE['Date'] . "<br>";
            echo "Time: " . $_COOKIE['Time'] . "<br>";
            echo "Your original total price is : " . $_COOKIE['Originalprice'].  "<br><br>";
            echo "Your actual total price is : ". $_COOKIE['Actualprice']."<br><br>"; 
            ?>

        </div>

        <div class="control-group">
        	<input type="radio" name="payment_type" value="Cash"> Cash<br>
        	<input type="radio" name="payment_type" value="Credit"> Credit<br>
        	<input type="radio" name="payment_type" value="Debit"> Debit<br><br>
       
        </div>

    </fieldset>
        <div class="submit">
			   <button class="btn btn-lg btn-warning" type="submit">Pay Bill</button>
		</div>

	</form>
</div>


</body>
</html>
