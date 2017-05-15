<?php
  // require_once "../headfiles/connect.php";

$conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");

$insertsql = "Insert into Customer (CustomerName,PhoneNumber) values (Null,Null)";

$result= mysqli_query($conn, $insertsql);

mysqli_close($conn);

if ($result){

header("Location: guest.handle2.php");
    //exit must be put after header();
exit;

}


?>
