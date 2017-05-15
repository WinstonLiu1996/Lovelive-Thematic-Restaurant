<?php

  $paymenttype = $_POST["payment_type"];

  //echo $paymenttype;
  $cid=$_COOKIE['CID'];
  $time=$_COOKIE['Time'];
  $date=$_COOKIE['Date'];

  $actualprice=$_COOKIE['Actualprice'];

  // echo $cid;
  // echo $date;
  // echo $time;
  // echo $actualprice;
  if ($paymenttype){
  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");

  $result=mysqli_query($conn, "INSERT INTO Pay_Bill VALUES ('$cid', '$time', '$date', '$paymenttype', '$actualprice')");

  $result1=mysqli_query($conn, "UPDATE Order_From_Cook_Deliver_Dish SET Status='Queued' WHERE CustomerID='$cid' ");
  
   mysqli_close($conn); 

   header("Location: consult.php");
   exit;
 }
  // if($result){
  //   echo '<script type="text/javascript">';
  //   echo 'alert("Add a dish successfully");';
  //   echo 'window.location.href = "order.php#menu";';
  //   echo '</script>';
  else {
    echo '<script type="text/javascript">';
    echo 'alert("Payment Method Not Selected");';
    echo 'window.location.href = "payment.php";';
    echo '</script>';
  }
?>
