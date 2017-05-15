<?php

  $dname = $_GET["dname"];
  $cid=$_COOKIE["CID"];

 

  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");
  $judge=mysqli_query($conn, "SELECT * FROM Order_From_Cook_Deliver_Dish WHERE CustomerID='$cid' AND DishName='$dname'");

  if (mysqli_num_rows($judge) > 0){
    $v=1;
  }

  $result=mysqli_query($conn, "DELETE FROM Order_From_Cook_Deliver_Dish WHERE CustomerID='$cid' AND DishName='$dname'");
  

  // echo "INSERT INTO Order_From_Cook_Deliver_Dish VALUES ('$cid', '$dname', Null, Null, 'Onhold')";

  mysqli_close($conn); 
  if($v){
    echo '<script type="text/javascript">';
    echo 'alert("Delete a dish successfully");';
    echo 'window.location.href = "order.php#menu";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Cannot Delete Not Ordered Dish");';
    echo 'window.location.href = "order.php#menu";';
    echo '</script>';
  }
?>
