<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consult Page</title>
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/consult.css" rel="stylesheet">
</head>
<body>
<?php
   function dbconnect(){
	$dbh = new PDO('mysql:host=localhost:8889;dbname=Restaurant', 'root', 'root');
	$dbh->beginTransaction();

	return $dbh;
}

function dbcommit(PDO &$dbh){
	$dbh->commit();
	$dbh=Null;
}

function dberror(&$dbh, $e){
	print "Error!: " . $e->getMessage() . "<br/>";
	$dbh=Null;
	die();
}
 ?>

<div class="maki">
</div>

<div class="consult">
	<div class="consult-head">
		<strong><center><font size=5, color="Red">
			<?php echo "Enjoy Your Meal, Customer NO.".$_COOKIE['CID']."!<br><br>"; ?>
		</font></center></strong></div>
	<form class="form-consult" role="form" name="form" action="consult.php" method="post">
		<button class="btn btn-lg btn-warning btn-block" name ="query1" type="submit">Query Your Dish Status</button>
	</form>
	<form class="form-consult" role="form" name="form" action="consult.php" method="post">
		<button class="btn btn-lg btn-warning btn-block" name ="query2" type="submit">Query Others' Total Price</button>
	</form>
	<form class="form-consult" role="form" name="form" action="consult.php" method="post">
		<button class="btn btn-lg btn-warning btn-block" name ="query3" type="submit">Query Others' Dish Numbers</button>
	</form>
	<form class="form-consult" role="form" name="form" action="index.php" method="post">
		<button class="btn btn-lg btn-warning btn-block" type="submit">LogOut</button>
	<!- Logout is OK, No need to worry!->	
	</form>
</div>

<strong><center><font size=5, color="blue">
<?php
    //echo $_COOKIE;
    $cid = $_COOKIE['CID'];

    //query1
    if (array_key_exists('query1', $_POST)){
     try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT DishName, Status FROM Order_From_Cook_Deliver_Dish WHERE CustomerID=:cid");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    echo '<table width="40%" height="100" border="0"， cellpadding="10" >';
    echo '<table border=1px>';  // opening table tag
    echo '<tr align="left">
          <td width="100">DishName</td>
          <td width="40" >Status</td>
        </tr>';

    dbcommit($dbh);
	 while($row = $stmt->fetch()){ 
      echo "<tr>";
      echo "<td>" . $row['DishName'] . "</td>";
      echo "<td>" . $row['Status'] . "</td>";
      echo "</tr>";   
	    //echo $row{'DishName'}."".$row{'Status'}."<br>";
	    } 

      echo "</table>";

      }catch(Exception $e){
       	dberror($dbh,$e);
	  }
}

//query2
if (array_key_exists('query2', $_POST)){
     try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT CustomerID, Sum(Price) as TOTALPRICE
FROM Order_From_Cook_Deliver_Dish, DishList
WHERE CustomerID<>:cid AND DishList.DishName=Order_From_Cook_Deliver_Dish.DishName
GROUP BY CustomerID;");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    echo '<table width="40%" height="100" border="0"， cellpadding="10" >';
    echo '<table border=1px>';  // opening table tag
    echo '<tr align="left">
          <td width="100">CustomerID</td>
          <td width="40" >TotalPrice</td>
        </tr>';

    dbcommit($dbh);
    while($row = $stmt->fetch()){
    echo "<tr>";
    echo "<td>" . $row['CustomerID'] . "</td>";
    echo "<td>" . round($row['TOTALPRICE'],2). "</td>";
    echo "</tr>";        
    //echo "ID:".$row{'CustomerID'}." Name:".$row{'TOTALPRICE'}."<br>";
       } 

     } catch(Exception $e) { 
     	dberror($dbh,$e);
     }
}
   //query3
   if (array_key_exists('query3', $_POST)){
     try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT CustomerID, Count(DishName) AS NumberDish FROM Order_From_Cook_Deliver_Dish WHERE CustomerID<>:cid GROUP BY CustomerID");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    echo '<table width="40%" height="100" border="0"， cellpadding="10" >';
    echo '<table border=1px>';  // opening table tag
    echo '<tr align="left">
          <td width="100">CustomerID</td>
          <td width="250" ># Of Dishes Ordered</td>
        </tr>';

    dbcommit($dbh);
    while($row = $stmt->fetch()){
    echo "<tr>";
    echo "<td>" . $row['CustomerID'] . "</td>";
    echo "<td>" . $row['NumberDish']. "</td>";
    echo "</tr>";        
    //echo "ID:".$row{'CustomerID'}." Name:".$row{'NumberDish'}."<br>";
} 

} catch(Exception $e) {
    
    dberror($dbh,$e);
  }
}
?>
</font></center></strong></div>

</body>
</html>
