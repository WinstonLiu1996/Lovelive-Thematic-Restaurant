<?php
 
  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");
  $judge=mysqli_query($conn, "SELECT * FROM Order_From_Cook_Deliver_Dish
WHERE CustomerID IN
(SELECT CustomerID
       FROM Customer
       WHERE CustomerName IS NOT Null)");

  if (mysqli_num_rows($judge) > 0){
    $v=1;
  }

  //echo $judge;

  $result=mysqli_query($conn, "Delete FROM Pay_Bill 
    Where CustomerID IN
      (SELECT CustomerID
       FROM Customer
       WHERE CustomerName IS NOT Null)");
  $result1=mysqli_query($conn, "Delete FROM Order_From_Cook_Deliver_Dish
Where CustomerID IN
(SELECT CustomerID
       FROM Customer
       WHERE CustomerName IS NOT Null)");
  

  // echo "INSERT INTO Order_From_Cook_Deliver_Dish VALUES ('$cid', '$dname', Null, Null, 'Onhold')";

  mysqli_close($conn); 
  if($v){
    echo '<script type="text/javascript">';
    echo 'alert("Delete Ordered Dishes and Bills For Members successfully");';
    echo 'window.location.href = "manage.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Cannot Delete Multiple Times");';
    echo 'window.location.href = "manage.php";';
    echo '</script>';
  }
?>
