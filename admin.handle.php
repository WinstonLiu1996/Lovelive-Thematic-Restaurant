<?php
  // require_once "../headfiles/connect.php";

require_once "pdoconnect.php";

$adminusername = $_POST["adminusername"];
$adminpassword = $_POST["adminpassword"];

try{
    $dbh=dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM Manager WHERE ManagerName=:adminusername AND ManagerID=:adminpassword");
    $stmt->bindParam(':adminusername', $adminusername);
    $stmt->bindParam(':adminpassword', $adminpassword);
    $stmt->execute();

    $stmt1 = $dbh->prepare("SELECT * FROM Chef WHERE ChefName=:adminusername AND ChefID=:adminpassword");
    $stmt1->bindParam(':adminusername', $adminusername);
    $stmt1->bindParam(':adminpassword', $adminpassword);
    $stmt1->execute();

    $stmt2 = $dbh->prepare("SELECT * FROM Servant WHERE ServantName=:adminusername AND ServantID=:adminpassword");
    $stmt2->bindParam(':adminusername', $adminusername);
    $stmt2->bindParam(':adminpassword', $adminpassword);
    $stmt2->execute();

    dbcommit($dbh);

} catch(Exception $e) {
    
    dberror($dbh,$e);
}
  //do not use fetch /fetch all object

$r = $stmt->fetch(PDO::FETCH_ASSOC);
$r1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$r2 = $stmt2->fetch(PDO::FETCH_ASSOC);


$ManagerID= $r['ManagerID'];
$ChefID= $r1['ChefID'];
$ChefName= $r1['ChefName'];
$ServantID= $r2['ServantID'];
$ServantName= $r2['ServantName'];

//var_dump($ManagerID);

if ($ManagerID){
    setcookie("MID","$ManagerID");
    //no echo before header!
    header("Location: manage.php");
    //exit must be put after header();
    exit;
} 


if ($ChefID){
    setcookie("CHID","$ChefID");
    setcookie("CN","$ChefName");
    //no echo before header!
    header("Location: cook.php");
    //exit must be put after header();
    exit;
}

if ($ServantID){
    setcookie("SID","$ServantID");
    setcookie("SN","$ServantName");
    //no echo before header!
    header("Location: deliver.php");
    //exit must be put after header();
    exit;

} 

else {
    echo '<script type="text/javascript">';
    echo 'alert("Login fail, please try again.");';
    echo 'window.location.href = "admin.php";';
    echo '</script>';
}
?>