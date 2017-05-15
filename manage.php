<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Page</title>
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/manage.css" rel="stylesheet">
</head>
<body>
<?php
require_once "pdoconnect.php";
 ?>

<div class="honoka">
</div>

<div class="consult">
	<div class="consult-head">
		<strong><center><font size=5, color="Red">
			<?php echo "Welcome, Manager NO.".$_COOKIE['MID']."!"; ?>
		</font></center></strong></div>
	<form class="form-consult" role="form" name="form" action="manage.php" method="post">
		<button class="btn btn-medium btn-warning btn-block" name ="query1" type="submit">Serving Star</button>
	</form>
	<form class="form-consult" role="form" name="form" action="manage.php" method="post">
		<button class="btn btn-medium btn-warning btn-block" name ="query2" type="submit">Favourite Dish</button>
	</form>
	<form class="form-consult" role="form" name="form" action="manage.delete1.php" method="post">
		<button class="btn btn-medium btn-warning btn-block" name ="query3" type="submit">Reset Non-Members</button>
	</form>
  <form class="form-consult" role="form" name="form" action="manage.delete2.php" method="post">
    <button class="btn btn-medium btn-warning btn-block" name ="query4" type="submit">Reset Members</button>
  </form>
  <form class="form-consult" role="form" name="form" action="manage.handle.php" method="post">
    <font size=2, color="Green">
    Select Manager Name:<input type="text" class="form-control" name="mname" id="mname" required autofocus />
    New Manager ID:<input type="text" class="form-control" name="mid" id="mid" required />
  </font>    <div><br></div>
    <button class="btn btn-medium btn-warning btn-block" name= "query5" type="submit">Update ManagerID</button>
  </form>
	<form class="form-consult" role="form" name="form" action="admin.php" method="post">
		<button class="btn btn-medium btn-warning btn-block" type="submit">LogOut</button>
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
    $stmt = $dbh->prepare("SELECT ServantName, ChefName 
      FROM Servant, Chef 
      WHERE Servant.Rank=Chef.Rank AND Servant.Rank=5");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    echo '<table width="40%" height="100" border="0"， cellpadding="10" >';
    echo '<table border=1px>';  // opening table tag
    echo '<tr align="left">
          <td width="100">ServantName</td>
          <td width="40" >ChefName</td>
        </tr>';

    dbcommit($dbh);
	 while($row = $stmt->fetch()){ 
      echo "<tr>";
      echo "<td>" . $row['ServantName'] . "</td>";
      echo "<td>" . $row['ChefName'] . "</td>";
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
    $stmt = $dbh->prepare("SELECT DISTINCT DishName
FROM Order_From_Cook_Deliver_Dish O1
WHERE NOT EXISTS
(SELECT * FROM Customer
 WHERE NOT EXISTS
 (SELECT * FROM Order_From_Cook_Deliver_Dish O2
 WHERE O1.DishName=O2.DishName AND Customer.CustomerID=O2.CustomerID))");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    echo '<table width="40%" height="100" border="0"， cellpadding="10" >';
    echo '<table border=1px>';  // opening table tag
    echo '<tr align="left">
          <td width="100">DishName</td>
        </tr>';

    dbcommit($dbh);
    while($row = $stmt->fetch()){
    echo "<tr>";
    echo "<td>" . $row['DishName'] . "</td>";
    echo "</tr>";        
    //echo "ID:".$row{'CustomerID'}." Name:".$row{'TOTALPRICE'}."<br>";
       } 

     } catch(Exception $e) { 
     	dberror($dbh,$e);
     }
}
   //query5
//    if (array_key_exists('query5', $_POST)){
//      try{
//     $dbh=dbconnect();

//     $mname=$_POST["mname"];
//     $newmid=$_POST["newmid"];
//     $stmt = $dbh->prepare("UPDATE Manager SET ManagerName=:mname WHERE ManagerName=:newmid;");
//     $stmt->execute();

//     dbcommit($dbh); 
//     echo $stmt->rowCount() . " records UPDATED successfully";     
//     //echo "ID:".$row{'CustomerID'}." Name:".$row{'NumberDish'}."<br>";

// } catch(Exception $e) {
    
//     dberror($dbh,$e);
// }
//}


?>
</font></center></strong></div>

</body>
</html>
