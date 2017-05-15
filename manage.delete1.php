<?php
 
  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");
  $judge=mysqli_query($conn, "SELECT * FROM Customer WHERE CustomerName IS Null");

  if (mysqli_num_rows($judge) > 0){
    $v=1;
  }

  //echo $judge;

  $result=mysqli_query($conn, "DELETE FROM Customer WHERE CustomerName IS Null");
  

  // echo "INSERT INTO Order_From_Cook_Deliver_Dish VALUES ('$cid', '$dname', Null, Null, 'Onhold')";

  mysqli_close($conn); 
  if($v){
    echo '<script type="text/javascript">';
    echo 'alert("Delete Non-members successfully");';
    echo 'window.location.href = "manage.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Cannot Delete Multiple Times");';
    echo 'window.location.href = "manage.php";';
    echo '</script>';
  }
?>
