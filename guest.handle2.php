<?php
  // require_once "../headfiles/connect.php";

require_once "pdoconnect.php";

try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT MAX(CustomerID) FROM Customer");
    $stmt->execute();

    while($row = $stmt->fetch()){       
    $CustomerID=$row{'MAX(CustomerID)'};
}  

    dbcommit($dbh);

} catch(Exception $e) {
    
    dberror($dbh,$e);
  }
  //do not use fetch /fetch all object

  if ($CustomerID){
    setcookie("CID","$CustomerID");
    //no echo before header!
    header("Location: order.php");
    //exit must be put after header();
    exit;

}


?>
