<?php

require_once "pdoconnect.php";

  $cid=$_COOKIE["CID"];
  date_default_timezone_set('America/Vancouver');
  $date = date("Y-m-d");
  $time = date("H:i:s");

  // echo $date;
  // echo $time;
  // echo $cid;
  setcookie("Date","$date");
  setcookie("Time","$time");

  try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT CustomerName FROM Customer WHERE CustomerID=:cid ");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    $stmt1 =$dbh->prepare("SELECT SUM(Price)  FROM DishList, Order_From_Cook_Deliver_Dish WHERE DishList.DishName=Order_From_Cook_Deliver_Dish.DishName AND Order_From_Cook_Deliver_Dish.CustomerID = :cid ");
    $stmt1->bindParam(':cid', $cid);
    $stmt1->execute();

    dbcommit($dbh);

} catch(Exception $e) {
    
    dberror($dbh,$e);
  }
$r = $stmt->fetch(PDO::FETCH_ASSOC);
$r1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$customername=$r['CustomerName'];
//echo $customername;
$originprice=round($r1['SUM(Price)'],2);
//echo $originprice;

  setcookie("Originalprice","$originprice");

if ($customername){
  $actualprice=round(0.8*$originprice,2);
  setcookie("Actualprice", $actualprice);
  header("Location: payment.php");
  exit;
}else{
  $actualprice=$originprice;
  setcookie("Actualprice", $actualprice);
  header("Location: payment.php");
  exit;

}

?>
