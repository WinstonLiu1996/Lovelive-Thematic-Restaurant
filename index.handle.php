<?php
  // require_once "../headfiles/connect.php";

require_once "pdoconnect.php";

  $username = $_POST["username"];
  $password = $_POST["password"];

  try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM Customer WHERE CustomerName=:username AND PhoneNumber=:password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    dbcommit($dbh);

} catch(Exception $e) {
    
    dberror($dbh,$e);
  }
  //do not use fetch /fetch all object

$r = $stmt->fetch(PDO::FETCH_ASSOC);
$CustomerID= $r['CustomerID'];

  //setcookie("CID","$v");
if ($CustomerID){
    setcookie("CID","$CustomerID");
    //no echo before header!
    header("Location: order.php");
    //exit must be put after header();
    exit;

} else {
    echo '<script type="text/javascript">';
    echo 'alert("Login fail, please try again.");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }
?>
