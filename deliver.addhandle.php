<?php

  $cid = $_GET["cid"];
  $dname = $_GET["dname"];
  $sid=$_COOKIE["SID"];

  // echo $dname;
  // echo $cid;

  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");

  $result=mysqli_query($conn, "UPDATE Order_From_Cook_Deliver_Dish SET ServantID = '$sid' WHERE CustomerID = '$cid' AND DishName = '$dname'");
   $result=mysqli_query($conn, "UPDATE Order_From_Cook_Deliver_Dish SET Status = 'Done' WHERE CustomerID = '$cid' AND DishName = '$dname'");

  // echo "INSERT INTO Order_From_Cook_Deliver_Dish VALUES ('$cid', '$dname', Null, Null, 'Onhold')";

  mysqli_close($conn); 
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Successfully Delivered");';
    echo 'window.location.href = "deliver.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location.href = "deliver.php";';
    echo '</script>';
  }
?>
