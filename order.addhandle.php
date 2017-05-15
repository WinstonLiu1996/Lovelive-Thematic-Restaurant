<?php

  $dname = $_GET["dname"];
  $cid=$_COOKIE["CID"];

  // echo $dname;
  // echo $cid;

  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");

  $result=mysqli_query($conn, "INSERT INTO Order_From_Cook_Deliver_Dish VALUES ('$cid', '$dname', Null, Null, 'Onhold')");

  // echo "INSERT INTO Order_From_Cook_Deliver_Dish VALUES ('$cid', '$dname', Null, Null, 'Onhold')";

  mysqli_close($conn); 
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Add a dish successfully");';
    echo 'window.location.href = "order.php#menu";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Cannot Do Multiple Add");';
    echo 'window.location.href = "order.php#menu";';
    echo '</script>';
  }
?>
