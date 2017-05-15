<?php

  $cid = $_GET["cid"];
  $dname = $_GET["dname"];
  $chid=$_COOKIE["CHID"];

  // echo $dname;
  // echo $cid;

  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");

  $result=mysqli_query($conn, "UPDATE Order_From_Cook_Deliver_Dish SET ChefID = '$chid' WHERE CustomerID = '$cid' AND DishName = '$dname'");
   $result=mysqli_query($conn, "UPDATE Order_From_Cook_Deliver_Dish SET Status = 'Processing' WHERE CustomerID = '$cid' AND DishName = '$dname'");

  mysqli_close($conn); 
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Successfully Cooked");';
    echo 'window.location.href = "cook.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location.href = "cook.php";';
    echo '</script>';
  }
?>